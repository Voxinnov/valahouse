<?php	 	

	class Abtimg extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listAbtimg(){
		
		
		


		$query = "SELECT * FROM `abt_img` c WHERE c.`abt_img_id`!='' ORDER BY `abt_img_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addAbtimg($inputs){
					$insert	=	array('abt_img_image'=>$this->addFilter($this->escapeHtml($inputs['photo'])),
										'abt_img_stus'=>$inputs['status']
										);
				
				$this->insert($insert,"abt_img");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editAbtimg($inputs){
					$insert	= array('abt_img_image'=>$this->addFilter($this->escapeHtml($inputs['photo'])),
										'abt_img_stus'=>$inputs['status'],	
										'abt_img_id'=>$inputs['id']
							);
				$this->update($insert,"abt_img",'`abt_img_id`='.$inputs['id']);		
				return true;
			}

	function updateGalleryImage($id,$image){
		 $this->update(array('abt_img_image'=>$image),'abt_img','`abt_img_id`='.$id);
	}
	 function getAbtimg($id){
		$query	=	"SELECT * FROM `abt_img` WHERE `abt_img_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllAbtimgDetails()
	{
		$query = "SELECT * FROM abt_img where  abt_img_stus=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}

}
?>