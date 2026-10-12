<?php	 	

	class Acimg extends MySql{
	
	
	

			
	
	function listAcimg(){
		
		
		


		$query = "SELECT * FROM `actvty_img` c WHERE c.`actvty_img_id`!='' ORDER BY `actvty_img_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addAcimg($inputs){
					$insert	=	array('actvty_img_photo'=>$this->addFilter($this->escapeHtml($inputs['photo'])),
					                    'actvty_img_desc'=> ' ',
										'activity'=>$inputs['activity']
										);
				//print_r($insert);exit;
				$this->insert($insert,"actvty_img");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editAcimg($inputs){
					$insert	= array('actvty_img_photo'=>$this->addFilter($this->escapeHtml($inputs['photo'])),
										'activity'=>$inputs['activity'],
										'actvty_img_desc'=>$inputs['dscr'],
										'actvty_img_id'=>$inputs['id']
							);
				$this->update($insert,"actvty_img",'`actvty_img_id`='.$inputs['id']);		
				return true;
				//print_r($insert);exit;
			}

	function updateGalleryImage($id,$image,$dscr,$ordrno){
	//	print_r($image);exit;
		//print_r($id);
	//	exit;
		 $this->update(array('actvty_img_photo'=>$image,'actvty_img_desc'=>$dscr,'actvty_order'=>$ordrno),'actvty_img','`actvty_img_id`='.$id);
	}
	 function getAcimg($id){
		$query	=	"SELECT * FROM `actvty_img` WHERE `actvty_img_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAcimg_act($id){
		$query	=	"SELECT * FROM `actvty_img` WHERE `activity`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	//	print_r($query);exit;
	}
	function getAcimg_actorder($id){
		$query	=	"SELECT * FROM `actvty_img` WHERE `activity`='$id' and actvty_order !=0  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	//	print_r($query);exit;
	}
	function getAllAcimgDetails()
	{
		$query = "SELECT * FROM actvty_img ";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}

}
?>