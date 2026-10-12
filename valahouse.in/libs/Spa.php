<?php	 	

	class Spa extends MySql{

			
	
	function listSpa(){
		
		
		


		$query = "SELECT * FROM `spa` c WHERE c.`spa_id`!='' ORDER BY `spa_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	  }
	 /* Add Testimonials
			*/			
			function addSpa($inputs){
		$insert	=	array('spa_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										'spa_rate'=>$inputs['rate'],
										'spa_descr'=>$inputs['description'],	
										'spa_status'=>$inputs['status']
										);
				//print_r($insert);exit;
				$this->insert($insert,"spa");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editSpa($inputs){
	$insert	=	array('spa_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										'spa_descr'=>$inputs['description'],	
										'spa_rate'=>$inputs['rate'],
										'spa_status'=>$inputs['status']
										);
	//print_r($insert);exit;
				$this->update($insert,"spa",'`spa_id`='.$inputs['id']);		
				return true;
			}

	function updateGalleryImage($id,$image){
		 $this->update(array('Spa_img'=>$image),'spa','`spa_id`='.$id);
	}
	 function getSpa($id){
		$query	=	"SELECT * FROM `spa` WHERE `spa_id`='$id'";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	
	function getAllSpaDetails()
	{
		$query = "SELECT * FROM `spa` where  `spa_id`!='' AND  spa_status=1";
		$rec = $this->fetchAll($query);
		return $rec;	
	}
	function getAllSpaMax()
	{
		$query = "SELECT max(spa_id) as max_id FROM `spa`";
		$rec = $this->fetchAll($query);
		return $rec;	
	}

}
?>