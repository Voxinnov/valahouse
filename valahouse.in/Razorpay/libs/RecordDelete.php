<?php

class RecordDelete extends MySql{


function deleteCaste($id){
				$query="SELECT * FROM `mtrimny_caste` WHERE `mtrimny_caste_id`='".$id."'";
					$rec=$this->fetchAll($query);
				/* 	unlink('../upload/testimonial/'.$rec[0]['jspr_clnt_img']); */
					$this->delete('mtrimny_caste','`mtrimny_caste_id`='.$id);
					
					
				
			}

function deleteSubcaste($id){
				$query="SELECT * FROM `mtrimny_subcaste` WHERE `subcaste_id`='".$id."'";
					$rec=$this->fetchAll($query);
				/* 	unlink('../upload/testimonial/'.$rec[0]['jspr_clnt_img']); */
					$this->delete('mtrimny_subcaste','`subcaste_id`='.$id);
					
					
				
			}


function deleteJob($id){
				$query="SELECT * FROM `job_matrimny` WHERE `job_id`='".$id."'";
					$rec=$this->fetchAll($query);
				/* 	unlink('../upload/testimonial/'.$rec[0]['jspr_clnt_img']); */
					$this->delete('job_matrimny','`job_id`='.$id);
					
					
				
			}
				function deleteEdu($id){
				$query="SELECT * FROM `edu_matrimny` WHERE `edu_id`='".$id."'";
					$rec=$this->fetchAll($query);
					
					
					$this->delete('edu_matrimny','`edu_id`='.$id);
					
					
				
			}

function deleteMthrtng($id){
				$query="SELECT * FROM `mthrtng_matrimny` WHERE `mthrtng_id`='".$id."'";
					$rec=$this->fetchAll($query);
				/* 	unlink('../upload/testimonial/'.$rec[0]['jspr_clnt_img']); */
					$this->delete('mthrtng_matrimny','`mthrtng_id`='.$id);
					
					
				
			}

function deletepro_img($id){
				$query="SELECT * FROM `profile_images` WHERE `m_id`='".$id."'";
					$rec=$this->fetchAll($query);
					unlink('admin/upload/reg/'.$rec[0]['profile_img']);
					
					$this->delete('profile_images','`m_id`='.$id);
					
					
				
			}



		
	function deleteBasicPaperad($id){						$query="SELECT * FROM `basic_ppr_ads_onetm` WHERE `bsic_ads_id`='".$id."'";									$rec=$this->fetchAll($query);										unlink('../upload/profile/'.$rec[0]['bsic_ads_imge']);										$this->delete('basic_ppr_ads_onetm','`bsic_ads_id`='.$id);																	}

	function deletService($id){
				$query="SELECT * FROM `jspr_service` WHERE `jspr_srvc_id`='".$id."'";
					$rec=$this->fetchAll($query);
					unlink('../upload/Service/'.$rec[0]['jspr_srvc_img']);
					$this->delete('jspr_service','`jspr_srvc_id`='.$id);
					
					
				
			}	

			function deleteTestimonial($id){
				$query="SELECT * FROM `testimonial_onetm` WHERE `tstmnl_id`='".$id."'";
					$rec=$this->fetchAll($query);
				/* 	unlink('../upload/testimonial/'.$rec[0]['jspr_clnt_img']); */
					$this->delete('testimonial_onetm','`tstmnl_id`='.$id);
					
					
				
			}	
			
			
						/* function deleteProfile($id){
				$query="SELECT * FROM `mtrimny_register` WHERE `m_id`='".$id."'";
					$rec=$this->fetchAll($query);
					
						$this->delete('mtrimny_register','`m_id`='.$id);
					
						//$this->delete('mtrimny_register','`m_id`='.$id);
							
					
				
			}	*/
		
		function deleteAdvertisement($id){
				$query="SELECT * FROM `advertisement_onetm` WHERE `ad_id`='".$id."'";
					$rec=$this->fetchAll($query);
					
					$this->delete('advertisement_onetm','`ad_id`='.$id);
					
					
				
			}
			
			
					function deleteAdvertisementcat($id){
				$query="SELECT * FROM `adv_cat` WHERE `adv_cat_id`='".$id."'";
					$rec=$this->fetchAll($query);
					
					$this->delete('adv_cat','`adv_cat_id`='.$id);
					
					
				
			}

			 
			function deleteSlider($id){
				$query="SELECT * FROM `slider_matrimny` WHERE `slider_id`='".$id."'";
					$rec=$this->fetchAll($query);
					unlink('../upload/slider/'.$rec[0]['slider_image']);
					
					$this->delete('slider_matrimny','`slider_id`='.$id);
					
					
				
			}


		function deleteProfile($id){
				$query="SELECT * FROM `mtrimny_register` WHERE `m_id`='".$id."'";
					$rec=$this->fetchAll($query);
					unlink('../upload/reg/'.$rec[0]['m_prof_photo']);
					
					unlink('../upload/reg/'.$rec[0]['m_photo2']);
					
					unlink('../upload/reg/'.$rec[0]['m_photo3']);
					
					unlink('../upload/reg/'.$rec[0]['m_photo4']);
					
					unlink('../upload/reg/'.$rec[0]['m_photo5']);
					$this->delete('mtrimny_register','`m_id`='.$id);
					
					
				
			}	

			



			
			
			

}