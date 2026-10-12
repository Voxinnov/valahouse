<?php	 	

	class Proimg extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listProimg(){
		
		
		


		$query = "SELECT * FROM `profile_images` c WHERE c.`m_id`!='' ORDER BY `m_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addProimg($inputs){
					$insert	=	array('profile_img'=>$this->addFilter($this->escapeHtml($inputs['photo'])),
							'mtrimny_register'=>$inputs['mtrimny_register']
										);
				//print_r($insert);exit;
				$this->insert($insert,"profile_images");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editProimg($inputs){
					$insert	= array('profile_img'=>$this->addFilter($this->escapeHtml($inputs['photo'])),
							'mtrimny_register'=>$inputs['mtrimny_register'],	
										'm_id'=>$inputs['id']
							);
				$this->update($insert,"profile_images",'`m_id`='.$inputs['id']);		
				return true;
			}

	function updateGalleryImage($id,$image){
		//print_r($image);
		//print_r($id);exit;
		 $this->update(array('profile_img'=>$image),'profile_images','`m_id`='.$id);
	}
	 function getProimg($id){
		$query	=	"SELECT * FROM `profile_images` WHERE `m_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getProimg_act($id){
		$query	=	"SELECT * FROM `profile_images` WHERE `mtrimny_register`='$id'  ";
		//print_r($query);exit;
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllProimgDetails()
	{
		$query = "SELECT * FROM profile_images where  sldr_stus=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}

}
?>