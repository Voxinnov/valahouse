<?php	 	

	class Trash extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listTrash(){
		
		
		$query = "SELECT * FROM `profile_otm` c WHERE c.`prof_id`!='' ORDER BY `prof_id` DESC";
		
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addProfile($inputs){
					$insert	=	array('prof_fname'=>$this->addFilter($this->escapeHtml($inputs['fname'])),
										'prof_lname'=>$inputs['lname'],
										'prof_age'=>$inputs['age'],
										'prof_lction'=>$inputs['location'],
										'prof_dob'=>$inputs['dob'],
										'prof_gender'=>$inputs['gender'],
										'prof_ftrsname'=>$inputs['fathername'],
										'prof_mtrsname'=>$inputs['mothername'],
										'prof_hname'=>$inputs['housename'],
										'prof_fstatus'=>$inputs['familystatus'],
										'prof_religion'=>$inputs['religion'],
										'prof_cast'=>$inputs['cast'],
										'prof_edctin'=>$inputs['education'],
										'prof_job'=>$inputs['job'],
										'prof_email'=>$inputs['email'],
										'prof_cndtno'=>$inputs['cndtno'],
										'prof_img'=>$inputs['photo'],
										'prof_status'=>2,
										'prof_id'=>$inputs['id']
							);
				
				$this->insert($insert,"profile_otm");	
				

				//print_r($insert);exit;
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editProfile($id){
					$insert	=	array('prof_fname'=>$this->addFilter($this->escapeHtml($inputs['fname'])),
										'prof_lname'=>$inputs['lname'],
										'prof_age'=>$inputs['age'],
										'prof_lction'=>$inputs['location'],
										'prof_dob'=>$inputs['dob'],
										'prof_gender'=>$inputs['gender'],
										'prof_ftrsname'=>$inputs['fathername'],
										'prof_mtrsname'=>$inputs['mothername'],
										'prof_hname'=>$inputs['housename'],
										'prof_fstatus'=>$inputs['familystatus'],
										'prof_religion'=>$inputs['religion'],
										'prof_cast'=>$inputs['cast'],
										'prof_edctin'=>$inputs['education'],
										'prof_job'=>$inputs['job'],
										'prof_email'=>$inputs['email'],
										'prof_cndtno'=>$inputs['cndtno'],
										'prof_img'=>$inputs['photo'],
										'prof_status'=>3,
										'prof_id'=>$id,
							);
							
							
							
				
		$this->update($insert,"profile_otm",'`prof_id`='.$inputs['id']);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
								
			
			
				
			}
			
	
			
			
			
function updateGalleryImage($id,$image){
		 $this->update(array('prof_img'=>$image),'profile_otm','`prof_id`='.$id);
	}

	 function getTrash($id){
		$query	=	"SELECT * FROM `profile_otm` WHERE `prof_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllProfileDetails()
	{
		$query = "SELECT * FROM  profile_otm where  prof_status=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}
	
		function getAllProfileDetailsTrash()
	{
		$query = "SELECT * FROM  profile_otm where  prof_status=3";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}

}
?>
	
	
	
	
	
	
	

	
	