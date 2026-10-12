<?php	 	

	class Spaimg extends MySql{
	
	
	

			
	
	function listSpaimg(){
		
		
		


		$query = "SELECT * FROM `spa_img` c WHERE c.`spa_img_id`!='' ORDER BY `spa_img_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addSpaimg($inputs){
					$insert	=	array('spa_img_img'=>$this->addFilter($this->escapeHtml($inputs['photo'])),
										'spa_img_spa'=>$inputs['spa_img_spa']
										);
				//print_r($insert);exit;
				$this->insert($insert,"spa_img");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editSpaimg($inputs){
					$insert	= array('spa_img_img'=>$this->addFilter($this->escapeHtml($inputs['photo'])),
										'spa_img_spa'=>$inputs['spa_img_spa'],
										'spa_img_id'=>$inputs['id']
							);
				$this->update($insert,"spa_img",'`spa_img_id`='.$inputs['id']);		
				return true;
				//print_r($insert);exit;
			}

	function updateGalleryImage($id,$image,$ordrno){
	//	print_r($image);exit;
	//	print_r($id);
	//	exit;
		 $this->update(array('spa_img_img'=>$image,'spa_img_order'=>$ordrno),'spa_img','`spa_img_id`='.$id);
	}
	 function getSpaimg($id){
		$query	=	"SELECT * FROM `spa_img` WHERE `spa_img_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getSpaimg_act($id){
		$query	=	"SELECT * FROM `spa_img` WHERE `spa_img_spa`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	//	print_r($query);exit;
	}
	function getSpaimg_actorder($id){
		$query	=	"SELECT * FROM `spa_img` WHERE `spa_img_spa`='$id' and spa_img_order !=0  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	//	print_r($query);exit;
	}
	function getAllSpaimgDetails()
	{
		$query = "SELECT * FROM spa_img ";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}

}
?>