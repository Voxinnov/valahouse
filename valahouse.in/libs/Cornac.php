<?php	 	

	class Cornac extends MySql{
	
	
	

	
	function listcornac(){
		
		
		


		$query = "SELECT * FROM `cornac` c WHERE c.`cornac_id`!='' ORDER BY `cornac_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	  }
	 /* Add Testimonials
			*/			
			function addcornac($inputs){
		$insert	=	array('cornac_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
									    	'cornac_banner'=>$inputs['banner'],
										'cornac_desc'=>$inputs['description']
										);
			//	print_r($insert);exit;
				$this->insert($insert,"cornac");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editcornac($inputs){
	$insert	=	array('cornac_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
									    	'cornac_banner'=>$inputs['banner'],
										'cornac_desc'=>$inputs['description']
										);
//	print_r($insert);exit;
				$this->update($insert,"cornac",'`cornac_id`='.$inputs['id']);		
				return true;
			}

	function updateGalleryImage($id,$image){
		 $this->update(array('cornac_banner'=>$image),'cornac','`cornac_id`='.$id);
	}
	 function getcornac(){
		$query	=	"SELECT * FROM `cornac` WHERE `cornac_id`=1";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	
	function getAllcornacDetails()
	{
		$query = "SELECT * FROM `cornac` where cornac_status=1";
		$rec = $this->fetchAll($query);
		return $rec;	
	}

}
?>