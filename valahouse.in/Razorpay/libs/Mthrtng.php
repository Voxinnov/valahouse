<?php	 	

	class Mthrtng extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listMthrtng(){
		
		
		$query = "SELECT * FROM `mthrtng_matrimny` c WHERE c.`mthrtng_id`!='' ORDER BY `mthrtng_id` DESC";
		
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addMthrtng($inputs){
					$insert	=	array('mthrtng_caption'=>$this->addFilter($this->escapeHtml($inputs['title'])),
									  
									  'mthrtng_status'=>$inputs['status'],
										);
				
				$this->insert($insert,"mthrtng_matrimny");	
				

				//print_r($insert);exit;
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editMthrtng($inputs){
					$insert	=	array('mthrtng_caption'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										
										'mthrtng_status'=>$inputs['status'],
										'mthrtng_id'=>$inputs['id']
							);
							
							
				
		$this->update($insert,"mthrtng_matrimny",'`mthrtng_id`='.$inputs['id']);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
								
			
			
				
			}
function updateGalleryImage($id,$image){
		 $this->update(array('mthrtng_image'=>$image),'mthrtng_matrimny','`mthrtng_id`='.$id);
	}


	 function getMthrtng(){
		$query	=	"SELECT * FROM `mthrtng_matrimny`  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllMthrtngDetails()
	{
		$query = "SELECT * FROM  mthrtng_matrimny where  mthrtng_status=1 ORDER BY `mthrtng_caption` ASC";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}


}
?>