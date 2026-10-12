<?php	 	

	class Activity extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listActivity(){
		
		
		


		$query = "SELECT * FROM `activity` c WHERE c.`activity_id`!=1 ORDER BY `activity_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	  }
	 /* Add Testimonials
			*/			
			function addActivity($inputs){
		$insert	=	array('activity_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										'activity_rate'=>$inputs['rate'],
										'activity_highlight'=>$inputs['hghlt'],
										'activity_incld'=>$inputs['incld'],
										'activity_not_incld'=>$inputs['not_incld'],
										'activity_dscrptn'=>$inputs['description'],	
										'activity_stus'=>$inputs['status']
										);
				//print_r($insert);exit;
				$this->insert($insert,"activity");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editActivity($inputs){
	$insert	=	array('activity_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										'activity_dscrptn'=>$inputs['description'],	
										'activity_rate'=>$inputs['rate'],
										'activity_highlight'=>$inputs['hghlt'],
										'activity_incld'=>$inputs['incld'],
										'activity_not_incld'=>$inputs['not_incld'],
										'activity_stus'=>$inputs['status']
										);
	//print_r($insert);exit;
				$this->update($insert,"activity",'`activity_id`='.$inputs['id']);		
				return true;
			}

	function updateGalleryImage($id,$image){
		 $this->update(array('activity_img'=>$image),'activity','`activity_id`='.$id);
	}
	 function getActivity($id){
		$query	=	"SELECT * FROM `activity` WHERE `activity_id`='$id'";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	
	function getAllActivityDetails()
	{
		$query = "SELECT * FROM `activity` where  `activity_id`!=1 AND  activity_stus=1";
		$rec = $this->fetchAll($query);
		return $rec;	
	}
	function getAllActivityMax()
	{
		$query = "SELECT max(activity_id) as max_id FROM `activity`";
		$rec = $this->fetchAll($query);
		return $rec;	
	}

}
?>