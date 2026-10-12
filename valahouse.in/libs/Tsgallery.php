<?php	 	

	class Tsgallery extends MySql{
	
	
	
			
	
	function listTsgallery(){
		
		
		


		$query = "SELECT * FROM `gallink` c WHERE c.`gallink_id`!='' ORDER BY `gallink_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
		function listTsgalleryId($id){
		
		
		


		$query = "SELECT * FROM `gallink` c WHERE c.`gallink_id`!=''and gallink_type=$id ORDER BY `gallink_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	 /* Add Testimonials
			*/			
			function addTsgallery($inputs){
					$insert	=	array('gallink_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										'gallink_link'=>$inputs['caption'],
										'ordrno'=>$this->addFilter($this->escapeHtml($inputs['order'])),
										'gallink_img'=>$inputs['photo'],
										'gallink_type'=>$inputs['type'],
										'gallink_status'=>$inputs['status'],
										);
				//print_r($insert);exit;
				$this->insert($insert,"gallink");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editTsgallery($inputs){
					$insert	=	array('gallink_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										'gallink_link'=>$inputs['caption'],
										'ordrno'=>$this->addFilter($this->escapeHtml($inputs['order'])),
										'gallink_img'=>$inputs['photo'],
										'gallink_status'=>$inputs['status'],
										'gallink_id'=>$inputs['id']
							);
					//print_r($insert);exit;
				$this->update($insert,"gallink",'`gallink_id`='.$inputs['id']);		
				return true;
			}

	function updateGalleryImage($id,$image){
		 $this->update(array('gallink_img'=>$image),'gallink','`gallink_id`='.$id);
	}
	 function getTsgallery($id){
		$query	=	"SELECT * FROM `gallink` WHERE `gallink_id`='$id' ";
		$rec		=	$this->fetchAll($query);
		//print_r($query);exit;
		return $rec;
	}
	
		 function getSlidermax(){
		$query	=	"SELECT max(ordrno) as ordrno FROM `gallink`";
		$rec		=	$this->fetchAll($query);
		//print_r($query);exit;
		return $rec;
	}

	function getAllTsgalleryDetails($id)
	{
		$query = "SELECT * FROM gallink where  gallink_status=1 and gallink_type=$id  ORDER BY `ordrno` ";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}

}
?>