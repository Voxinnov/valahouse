# Course-Type Exam Validation Rules & AI Score Calculation

## Overview

This feature introduces a **Course Exam Validation Rules** system that allows admins/teachers to configure exam-specific rules per course type. The AI verification and score calculation will then use these rules as the primary evaluation framework — replacing the current hardcoded logic spread across `StudentAnswerAIService`, `GoetheEvaluationService`, and `calculateConfidenceScore`.

---

## Current State Analysis

| Concern | Current Behavior |
|---|---|
| Course model | Only has `name` — no type or exam rules |
| CEFR level detection | Inferred by scanning the course `name` string (e.g., `str_contains($name, 'A1')`) |
| Scoring weights | Hardcoded constants in `GoetheEvaluationService::GOETHE_CRITERIA` |
| Confidence score | Hardcoded formula: 50% grammar + 50% relevance |
| Word count limits | Hardcoded per CEFR level in `GoetheEvaluationService` |
| Pass criteria | Hardcoded in `TestResource` as a flat `passmark` integer |

---

## Open Questions

> [!IMPORTANT]
> Please clarify the following before implementation begins.

1. **What are your "course types"?** Examples: `Goethe A1`, `Goethe B1`, `Telc A2`, `ÖSD B1`, `Custom`. Do you want a fixed set of types or a free-form system?

2. **What rules do you want to configure per course type?** For example:
   - Minimum word count required
   - Maximum error rate allowed (errors per 100 words)
   - Score component weights (grammar %, vocabulary %, content %, structure %)
   - Passmark threshold (%)
   - Writing format requirements (must include greeting/closing for emails)

3. **Should rules cascade?** (e.g., course-level rules override course-type defaults)

4. **Who manages rules?** Admins only, or also teachers?

---

## Proposed Changes

### 1. Database — New Tables & Columns

---

#### [NEW] `course_types` table
Stores the named course types (Goethe A1, Telc A2, etc.)

```
id, name, cefr_level (enum A1/A2/B1/B2/C1/C2), description, timestamps
```

#### [NEW] `course_exam_rules` table
Stores the configurable validation rules for each course type.

```
id
course_type_id (FK → course_types)
min_word_count         (int, nullable)
max_word_count         (int, nullable)
max_error_rate         (float, nullable)  -- errors per 100 words
grammar_weight         (float, default 0.30)
vocabulary_weight      (float, default 0.25)
structure_weight       (float, default 0.20)
content_weight         (float, default 0.15)
accuracy_weight        (float, default 0.10)
passmark_percent       (float, default 60.0)
require_greeting       (bool, default false)
require_closing        (bool, default false)
require_subject_line   (bool, default false)
ai_prompt_instructions (text, nullable)   -- extra guidance sent to OpenAI
timestamps
```

#### [MODIFY] `courses` table — add `course_type_id`
```
course_type_id (FK → course_types, nullable)
```

---

### 2. Models

---

#### [NEW] `app/Models/CourseType.php`
Eloquent model with `hasOne(CourseExamRule)` and `hasMany(Course)`.

#### [NEW] `app/Models/CourseExamRule.php`
Eloquent model with `belongsTo(CourseType)`. Includes helper methods:
- `getWeightsArray()` — returns component weights normalized to sum to 1.0
- `meetsWordCountRequirement(int $words): bool`
- `meetsErrorRateRequirement(float $rate): bool`

#### [MODIFY] `app/Models/Course.php`
Add `belongsTo(CourseType)` relationship and a `getExamRules()` helper that returns the associated `CourseExamRule` (or a sensible default object).

---

### 3. Filament Admin UI

---

#### [NEW] `app/Filament/Resources/CourseTypeResource.php`
Admin panel resource to manage course types and their exam rules:
- **List** — shows all course types with their CEFR level
- **Create/Edit** — form includes:
  - Course type name, CEFR level selector
  - Section: **Scoring Weights** (five sliders/inputs that must sum to 1.0)
  - Section: **Validation Thresholds** (min/max word count, max error rate, passmark %)
  - Section: **Writing Format Requirements** (toggles: require greeting, require closing, require subject line)
  - Section: **AI Instructions** (text area for extra guidance injected into OpenAI prompt)

#### [MODIFY] `app/Filament/Resources/CourseResource.php`
Add a `Select::make('course_type_id')` to the course form, allowing admin to link a course to a course type.

---

### 4. Service Layer

---

#### [NEW] `app/Services/ExamRulesService.php`
Central service for resolving exam rules for any context:
```php
getExamRulesForAnswer(StudentAnswer $answer): CourseExamRule
getExamRulesForCourse(Course $course): CourseExamRule
getDefaultRules(string $cefrLevel): CourseExamRule
```
Falls back gracefully: `answer.test.course.courseType.examRule` → `answer.question.course.courseType.examRule` → CEFR-based defaults.

#### [MODIFY] `app/Services/StudentAnswerAIService.php`
- Inject `ExamRulesService`
- In `processStudentAnswer()`, resolve exam rules before processing
- Pass exam rules to `calculateConfidenceScore()` so weights come from DB config
- Pass `ai_prompt_instructions` from exam rules into the OpenAI prompt
- Validate word count and structure requirements from rules; surface validation failures in the response

#### [MODIFY] `app/Services/GoetheEvaluationService.php`
- Accept optional `CourseExamRule` parameter in `evaluateAccordingToGoetheStandards()`
- Use DB-driven weights instead of the hardcoded `GOETHE_CRITERIA` constants when a rule is provided
- Keep hardcoded constants as fallback defaults

#### [MODIFY] `app/Services/StudentAnswerAIService.php` — `calculateConfidenceScore()`
Replace hardcoded `50% grammar + 50% relevance` with:
```php
$grammarWeight    = $rules->grammar_weight;
$vocabularyWeight = $rules->vocabulary_weight;
$structureWeight  = $rules->structure_weight;
$contentWeight    = $rules->content_weight;
$accuracyWeight   = $rules->accuracy_weight;
```

---

### 5. AI Prompt Enhancement

---

#### [MODIFY] `app/Services/OpenAIService.php`
- Add `$extraInstructions` optional parameter to `generateGoetheExplanations()` and `generateExplanations()`
- Inject `ai_prompt_instructions` from the exam rule into the system prompt

---

### 6. Migrations

---

#### [NEW] `YYYY_MM_DD_create_course_types_table.php`
#### [NEW] `YYYY_MM_DD_create_course_exam_rules_table.php`
#### [NEW] `YYYY_MM_DD_add_course_type_id_to_courses_table.php`

#### [NEW] Seeder: `CourseTypeSeeder.php`
Pre-seeds the standard Goethe types (A1–C2) with default weights matching the existing hardcoded `GOETHE_CRITERIA`.

---

### 7. Validation Feedback to Student

---

#### [MODIFY] `app/Http/Controllers/StudentQuestionController.php`
When an answer fails exam rule validation (e.g., too few words), return a structured error in the JSON response that the frontend can display clearly:
```json
{
  "success": false,
  "validation_failed": true,
  "rules_violated": ["min_word_count", "require_greeting"],
  "message": "Your answer must be at least 80 words and include a greeting."
}
```

---

## Verification Plan

### Automated Tests
```bash
php artisan test --filter ExamRulesServiceTest
php artisan test --filter CourseExamRuleTest
```

### Manual Verification
1. Create a new Course Type (e.g., "Goethe A2") with custom weights in the Filament admin
2. Link an existing A2 course to that type
3. Submit a student answer for an opinion question in that course
4. Confirm AI confidence score uses the configured weights
5. Submit an answer with fewer words than `min_word_count` — confirm validation error
6. Confirm OpenAI receives the `ai_prompt_instructions` text in the prompt (visible in logs)

---

## ETA Estimate

| Phase | Task | Days |
|---|---|---|
| 1 | DB migrations + models (`CourseType`, `CourseExamRule`) | 1 |
| 2 | `ExamRulesService` + seeder for default Goethe types | 1 |
| 3 | Filament `CourseTypeResource` admin UI | 1.5 |
| 4 | Modify `CourseResource` to link to course type | 0.5 |
| 5 | Wire exam rules into `StudentAnswerAIService` scoring | 1 |
| 6 | Wire exam rules into `GoetheEvaluationService` | 0.5 |
| 7 | Pass `ai_prompt_instructions` into OpenAI prompts | 0.5 |
| 8 | Validation feedback in `StudentQuestionController` | 0.5 |
| 9 | Testing + bug fixes | 1 |
| **Total** | | **~7.5 working days** |

> [!NOTE]
> ETA assumes a single developer and no major blockers. If the open questions (course type taxonomy, rules structure) are resolved quickly, work can begin immediately on phases 1–2.
