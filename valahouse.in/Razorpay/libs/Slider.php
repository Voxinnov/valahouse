<?php	 	

	class Slider extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listSlider(){
		
		
		$query = "SELECT * FROM `slider_matrimny` c WHERE c.`slider_id`!='' ORDER BY `slider_id` DESC";
		
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addSlider($inputs){
					$insert	=	array('slider_caption'=>$this->addFilter($this->escapeHtml($inputs['title'])),
									  'slider_description'=>$inputs['caption'],
									  'slider_image'=>$inputs['photo'],
									  'slider_status'=>$inputs['status'],
										);
				
				$this->insert($insert,"slider_matrimny");	
				

				//print_r($insert);exit;
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editSlider($inputs){
					$insert	=	array('slider_caption'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										'slider_description'=>$inputs['caption'],
										'slider_image'=>$inputs['photo'],
										'slider_status'=>$inputs['status'],
										'slider_id'=>$inputs['id']
							);
							
							
				
		$this->update($insert,"slider_matrimny",'`slider_id`='.$inputs['id']);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
								
			
			
				
			}
function updateGalleryImage($id,$image){
		 $this->update(array('slider_image'=>$image),'slider_matrimny','`slider_id`='.$id);
	}


	 function getSlider($id){
		$query	=	"SELECT * FROM `slider_matrimny` WHERE slider_id=$id  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllSliderDetails()
	{
		$query = "SELECT * FROM  slider_matrimny where  slider_status=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}
	function deleteSlider($id){
				$query="SELECT * FROM `slider_matrimny` WHERE `slider_id`='".$id."'";
					$rec=$this->fetchAll($query);
					unlink('../upload/slider/'.$rec[0]['slider_image']);
					
					$this->delete('slider_matrimny','`slider_id`='.$id);
					
					
				
			}

}
?>