<?php	 	

	class GalleryList extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listGalleryList(){
		
		
		


		$query = "SELECT * FROM `gip_glry_type` c WHERE c.`gip_glry_type_id`!='' ORDER BY `gip_glry_type_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	 /* Add Testimonials
			*/			
			function addGalleryList($inputs){
					$insert	=	array('gip_glry_type_titl'=>$this->addFilter($this->escapeHtml($inputs['title'])),
						'gip_glry_type_status'=>$inputs['status'],
						'gip_glry_type_img'=>$inputs['photo'],										);
				//print_r($insert);exit;
				$this->insert($insert,"gip_glry_type");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editGalleryList($inputs){
					$insert	=	array('gip_glry_type_titl'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										'gip_glry_type_img'=>$inputs['photo'],
										'gip_glry_type_status'=>$inputs['status'],
										'gip_glry_type_id'=>$inputs['id']
							);
				$this->update($insert,"gip_glry_type",'`gip_glry_type_id`='.$inputs['id']);		
				return true;
			}

	function updateGalleryImage($id,$image){
		 $this->update(array('gip_glry_type_img'=>$image),'gip_glry_type','`gip_glry_type_id`='.$id);
	}
	 function getGalleryList($id){
		$query	=	"SELECT * FROM `gip_glry_type` WHERE `gip_glry_type_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllGalleryListDetails()
	{
		$query = "SELECT * FROM gip_glry_type where gip_glry_type_status=1 ";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}

}
?>