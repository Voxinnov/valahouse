<?php	 	

	class Cornacimg extends MySql{
	
	

			
	
	function listCornacimg(){
		
		
		


		$query = "SELECT * FROM `cornacimg` c WHERE c.`cornacimg_id`!='' ORDER BY `cornacimg_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addCornacimg($input){
					$insert	=	array('cornacimg_img'=>$this->addFilter($this->escapeHtml($input['photo']))
										);
			//	print_r($input);exit;
				$this->insert($insert,"cornacimg");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editCornacimg($inputs){
					$insert	= array('cornacimg_img'=>$this->addFilter($this->escapeHtml($inputs['photo'])),
										'cornacimg_order'=>$inputs['order'],	
										'cornacimg_id'=>$inputs['id']
							);
				$this->update($insert,"cornacimg",'`cornacimg_id`='.$inputs['id']);		
				return true;
			}

	function updateGalleryImage($id,$image,$ordrno){
	   // print_r($id);
	   // print_r($image);
	   // print_r($ordrno);exit;
		 $this->update(array('cornacimg_img'=>$image,'cornacimg_order'=>$ordrno),'cornacimg','`cornacimg_id`='.$id);
	}
	 function getCornacimg($id){
		$query	=	"SELECT * FROM `cornacimg` WHERE `cornacimg_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllCornacimgDetails()
	{
		$query = "SELECT * FROM cornacimg";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}

}
?>