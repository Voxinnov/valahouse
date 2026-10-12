<?php	 	

	class Testimonial extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listTestimonial(){
		
		
		


$query = "SELECT * FROM `testi` WHERE `testi_id`!='' ORDER BY `testi_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	 /* Add Testimonials
			*/			
			function addTestimonial($inputs){
	$insert	=	array('testi_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
								'testi_dscrptn'=>$inputs['description'],
								'testi_stus'=>$inputs['status']
										
										
										);
			//print_r($insert);exit;
				$this->insert($insert,"testi");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editTestimonial($inputs){
	$insert	=	array('testi_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
								'testi_dscrptn'=>$inputs['description'],
								'testi_stus'=>$inputs['status']
										
							);
				$this->update($insert,"testi",'`testi_id`='.$inputs['id']);		
				return true;
			}

	/*function updateGalleryImage($id,$image){
		 $this->update(array('faculty_image'=>$image),'testi','`testi_id`='.$id);
	}*/
	  function getTestimonial($id){
		$query	=	"SELECT * FROM `testi` WHERE `testi_id`='$id'";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}


	 function getAllTestimonial(){
		$query	=	"SELECT * FROM `testi` where  testi_stus=1";

		$rec		=	$this->fetchAll($query);
		return $rec;
	}

}
?>