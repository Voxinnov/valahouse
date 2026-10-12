<?php	 	

	class Rooms extends MySql{
	
	
	

	
	function listRooms(){
		
		
		


		$query = "SELECT * FROM `rooms` c WHERE c.`rooms_id`!='' ORDER BY `rooms_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	  }
	 /* Add Testimonials
			*/			
			function addRooms($inputs){
		$insert	=	array('rooms_titl'=>$this->addFilter($this->escapeHtml($inputs['title'])),
									
										'rooms_banner'=>$inputs['banner'],
										'rooms_rate'=>$inputs['rate'],
										'rooms_inclusion'=>$inputs['incld'],
										'rooms_dscr'=>$inputs['description'],	
										'rooms_360'=>$inputs['roomlink'],	
										'rooms_status'=>$inputs['status']
										);
			//	print_r($insert);exit;
				$this->insert($insert,"rooms");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editRooms($inputs){
	$insert	=	array('rooms_titl'=>$this->addFilter($this->escapeHtml($inputs['title'])),
									    	'rooms_banner'=>$inputs['banner'],
									    'rooms_rate'=>$inputs['rate'],
										'rooms_inclusion'=>$inputs['incld'],
										'rooms_dscr'=>$inputs['description'],
										'rooms_360'=>$inputs['roomlink'],
										'rooms_status'=>$inputs['status']
										);
//	print_r($insert);exit;
				$this->update($insert,"rooms",'`rooms_id`='.$inputs['id']);		
				return true;
			}

	function updateGalleryImage($id,$image){
		 $this->update(array('rooms_img'=>$image),'rooms','`rooms_id`='.$id);
	}
	 function getRooms($id){
		$query	=	"SELECT * FROM `rooms` WHERE `rooms_id`='$id'";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	
	function getAllRoomsDetails()
	{
		$query = "SELECT * FROM `rooms` where rooms_status=1";
		$rec = $this->fetchAll($query);
		return $rec;	
	}
	function getAllRoomsMax()
	{
		$query = "SELECT max(rooms_id) as max_id FROM `rooms`";
		$rec = $this->fetchAll($query);
		return $rec;	
	}

}
?>