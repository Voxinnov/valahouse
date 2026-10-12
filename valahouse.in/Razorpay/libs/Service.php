<?php	 	

	class Service extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listService(){
		
		
		


		$query = "SELECT * FROM `jspr_service` c WHERE c.`jspr_srvc_id`!='' ORDER BY `jspr_srvc_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	  }
	 /* Add Testimonials
			*/			
			function addService($inputs){
		$insert	=	array('jspr_srvc_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),	
							'jspr_srvc_dscrptn'=>$inputs['description'],
										'jspr_srvc_img'=>$inputs['photo'],
										'jspr_srvc_stus'=>$inputs['status'],
										);
				//print_r($insert);exit;
				$this->insert($insert,"jspr_service");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editService($inputs){
	$insert	=	array('jspr_srvc_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),	
							'jspr_srvc_dscrptn'=>$inputs['description'],
										'jspr_srvc_img'=>$inputs['photo'],
										'jspr_srvc_stus'=>$inputs['status']
										);
	//print_r($insert);exit;
				$this->update($insert,"jspr_service",'`jspr_srvc_id`='.$inputs['id']);		
				return true;
			}

	function updateGalleryImage($id,$image){
		 $this->update(array('jspr_srvc_img'=>$image),'jspr_service','`jspr_srvc_id`='.$id);
	}
	 function getService($id){
		$query	=	"SELECT * FROM `jspr_service` WHERE `jspr_srvc_id`='$id'";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	
	function getAllServiceDetails()
	{
		$query = "SELECT * FROM jspr_service where jspr_srvc_stus=1";
		$rec = $this->fetchAll($query);
		return $rec;	
	}

}
?>