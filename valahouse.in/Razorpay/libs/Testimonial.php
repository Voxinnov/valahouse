<?php	 	

	class Testimonial extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listTestimonial(){
		
		
		$query = "SELECT * FROM `testimonial_mtrimny` c WHERE c.`tstmnl_id`!='' ORDER BY `tstmnl_id` DESC";
		
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addTestimonial($inputs){
					$insert	=	array('tstmnl_name'=>$this->addFilter($this->escapeHtml($inputs['title'])),
									  'tstmnl_dsption'=>$inputs['caption'],
									  'tstmnl_image'=>$inputs['photo'],
									  'tstmnl_status'=>$inputs['status'],
										);
				
				$this->insert($insert,"testimonial_mtrimny");	
				

				//print_r($insert);exit;
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editTestimonial($inputs){
					$insert	=	array('tstmnl_name'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										'tstmnl_dsption'=>$inputs['caption'],
										'tstmnl_image'=>$inputs['photo'],
										'tstmnl_status'=>$inputs['status'],
										'tstmnl_id'=>$inputs['id']
							);
							
							
				
		$this->update($insert,"testimonial_mtrimny",'`tstmnl_id`='.$inputs['id']);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
								
			
			
				
			}
function updateGalleryImage($id,$image){
		 $this->update(array('tstmnl_image'=>$image),'testimonial_mtrimny','`tstmnl_id`='.$id);
	}

	 function getTestimonial($id){
		$query	=	"SELECT * FROM `testimonial_mtrimny` WHERE `tstmnl_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllTestimonialDetails()
	{
		$query = "SELECT * FROM  testimonial_mtrimny where  tstmnl_status=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}

}
?>