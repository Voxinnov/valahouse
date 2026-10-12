<?php	 	

	class Roomsimg extends MySql{
	

	
	function listAcimg(){
		
		$query = "SELECT * FROM `room_img` c WHERE c.`room_img_id`!='' ORDER BY `room_img_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addAcimg($inputs){
					$insert	=	array('room_img_photo'=>$this->addFilter($this->escapeHtml($inputs['photo'])),
										'room_img_descr'=>' ',
										'img_type'=>$inputs['type'],
										'room'=>$inputs['activity']
										);
				//print_r($insert);exit;
				$this->insert($insert,"room_img");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editAcimg($inputs){
					$insert	= array('room_img_photo'=>$this->addFilter($this->escapeHtml($inputs['photo'])),
										'room'=>$inputs['activity'],	
										'room_img_descr'=>$inputs['dscr'],	
										'room_img_id'=>$inputs['id']
							);
				$this->update($insert,"room_img",'`room_img_id`='.$inputs['id']);		
				return true;
				//print_r($insert);exit;
			}

	function updateGalleryImage($id,$image,$dscr){
		//print_r($image);
		//print_r($id);exit;
		 $this->update(array('room_img_photo'=>$image,'room_img_descr'=>$dscr),'room_img','`room_img_id`='.$id);
	}
	 function getAcimg($id){
		$query	=	"SELECT * FROM `room_img` WHERE `room_img_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAcimg_act($id){
		$query	=	"SELECT * FROM `room_img` WHERE `room`='$id' AND img_type=1  ";
	//	print_r($query);exit;
		$rec		=	$this->fetchAll($query);
		return $rec;
		print_r($query);exit;
	}
	function getAcimg_actfac($id){
		$query	=	"SELECT * FROM `room_img` WHERE `room`='$id' AND img_type=2  ";
	//	print_r($query);exit;
		$rec		=	$this->fetchAll($query);
		return $rec;
		print_r($query);exit;
	}
	function getAllAcimgDetails()
	{
		$query = "SELECT * FROM room_img ";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}

}
?>