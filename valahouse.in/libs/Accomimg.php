<?php	 	

	class Accomimg extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listAcimg(){
		
		
		


		$query = "SELECT * FROM `accom_img` c WHERE c.`accom_img_id`!='' ORDER BY `accom_img_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addAcimg($inputs){
					$insert	=	array('accom_img_img'=>$this->addFilter($this->escapeHtml($inputs['photo'])),
										
										);
				//print_r($insert);exit;
				$this->insert($insert,"accom_img");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editAcimg($inputs){
					$insert	= array('accom_img_img'=>$this->addFilter($this->escapeHtml($inputs['photo'])),
											
										'accom_img_id'=>$inputs['id']
							);
				$this->update($insert,"accom_img",'`accom_img_id`='.$inputs['id']);		
				return true;
			}

	function updateGalleryImage($id,$image){
		//print_r($image);
		//print_r($id);exit;
		 $this->update(array('accom_img_img'=>$image),'accom_img','`accom_img_id`='.$id);
	}
	 function getAcimg($id){
		$query	=	"SELECT * FROM `accom_img` WHERE `accom_img_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAcimg_act($id){
		$query	=	"SELECT * FROM `accom_img` WHERE `activity`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllAcimgDetails()
	{
		$query = "SELECT * FROM accom_img ";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}

}
?>