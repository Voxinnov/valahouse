<?php	 	

	class Testimonial extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listTestimonial(){
		
		
		


$query = "SELECT * FROM `jspr_tstmnl` WHERE `jspr_tstmnl_id`!='' ORDER BY `jspr_tstmnl_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	 /* Add Testimonials
			*/			
			function addTestimonial($inputs){
	$insert	=	array('jspr_tstmnl_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
								'jspr_tstmnl_place'=>$inputs['place'],
								'jspr_tstmnl_dscrptn'=>$inputs['description'],
								'jspr_tstmnl_stus'=>$inputs['status']
										
										
										);
				//print_r($insert);exit;
				$this->insert($insert,"jspr_tstmnl");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editTestimonial($inputs){
	$insert	=	array('jspr_tstmnl_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
								'jspr_tstmnl_place'=>$inputs['place'],
								'jspr_tstmnl_dscrptn'=>$inputs['description'],
								'jspr_tstmnl_stus'=>$inputs['status']
										
							);
				$this->update($insert,"jspr_tstmnl",'`jspr_tstmnl_id`='.$inputs['id']);		
				return true;
			}

	/*function updateGalleryImage($id,$image){
		 $this->update(array('faculty_image'=>$image),'jspr_tstmnl','`jspr_tstmnl_id`='.$id);
	}*/
	  function getTestimonial($id){
		$query	=	"SELECT * FROM `jspr_tstmnl` WHERE `jspr_tstmnl_id`='$id'";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}


	 function getAllTestimonial(){
		$query	=	"SELECT * FROM `jspr_tstmnl` where  jspr_tstmnl_stus=1";

		$rec		=	$this->fetchAll($query);
		return $rec;
	}

}
?>