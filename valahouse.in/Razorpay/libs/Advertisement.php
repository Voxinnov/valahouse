<?php	 	

	class Advertisement extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listAdvertisement(){
		
		
		$query = "SELECT * FROM `advertisement_mtrimny` c WHERE c.`ad_id`!='' ORDER BY `ad_id` DESC";
		
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addAdvertisement($inputs){
					$insert	=	array('ad_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
						//'ad_cat'=>$inputs['ad_cat'],
									  'ad_description'=>$inputs['caption'],
									  'ad_lctn'=>$inputs['lctn'],
									  'ad_icn_img'=>$inputs['iconimg'],
									  'ad_image'=>$inputs['photo'],
									  'ad_status'=>$inputs['status'],
										);
			//	print_r($insert);exit;
				$this->insert($insert,"advertisement_mtrimny");	
				

				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editAdvertisement($inputs){
					$insert	=	array('ad_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										'ad_description'=>$inputs['caption'],
										
										//'ad_cat'=>$inputs['ad_cat'],
										'ad_image'=>$inputs['photo'],
										'ad_lctn'=>$inputs['lctn'],
									  'ad_icn_img'=>$inputs['iconimg'],
										'ad_status'=>$inputs['status'],
										'ad_id'=>$inputs['id']
							);
							
							
				
		$this->update($insert,"advertisement_mtrimny",'`ad_id`='.$inputs['id']);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
								
			
			
				
			}
function updateGalleryImage($id,$image){
		 $this->update(array('ad_image'=>$image),'advertisement_mtrimny','`ad_id`='.$id);
	}
	function updateGalleryImage2($id,$image1){
		 $this->update(array('ad_icn_img'=>$image),'advertisement_mtrimny','`ad_id`='.$id);
	}


	 function getAdvertisement($id){
		$query	=	"SELECT * FROM `advertisement_mtrimny` WHERE `ad_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	 function getAdvertisementcat($id){
		$query	=	"SELECT * FROM `advertisement_mtrimny` WHERE `ad_cat`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllAdvertisementDetails()
	{
		$query = "SELECT * FROM  advertisement_mtrimny where  ad_status=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}

}
?>