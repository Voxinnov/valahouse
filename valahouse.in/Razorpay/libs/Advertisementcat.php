<?php	 	

	class Advertisementcat extends MySql{
	
	
	
			
	
	function listAdvertisementcat(){
		
		
		$query = "SELECT * FROM `adv_cat` c WHERE c.`adv_cat_id`!='' ORDER BY `adv_cat_id` DESC";
		
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addAdvertisementcat($inputs){
		$insert	=	array('adv_cat_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
									  'adv_cat_img'=>$inputs['photo'],
									  'adv_cat_status'=>$inputs['status'],
										);
				
				$this->insert($insert,"adv_cat");	
				

				//print_r($insert);exit;
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editAdvertisementcat($inputs){
					$insert	=	array('adv_cat_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										'adv_cat_img'=>$inputs['photo'],
										'adv_cat_status'=>$inputs['status'],
										'adv_cat_id'=>$inputs['id']
							);
							
							
				
		$this->update($insert,"adv_cat",'`adv_cat_id`='.$inputs['id']);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
								
			
			
				
			}
function updateGalleryImage($id,$image){
		 $this->update(array('adv_cat_img'=>$image),'adv_cat','`adv_cat_id`='.$id);
	}

	 function getAdvertisementcat($id){
		$query	=	"SELECT * FROM `adv_cat` WHERE `adv_cat_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllAdvertisementcatDetails()
	{
		$query = "SELECT * FROM  adv_cat where  adv_cat_status=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}

}
?>