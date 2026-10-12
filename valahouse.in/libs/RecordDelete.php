<?php

class RecordDelete extends MySql{
		


			function deleteTestimonial($id){
				$query="SELECT * FROM `testi` WHERE `testi_id`='".$id."'";
					$rec=$this->fetchAll($query);
					
					
					$this->delete('testi','`testi_id`='.$id);
					
					
				
			}

			function deleteNearest($id){
				$query="SELECT * FROM `nrst_plce` WHERE `nr_id`='".$id."'";
					$rec=$this->fetchAll($query);
					
					
					$this->delete('nrst_plce','`nr_id`='.$id);
					
					
				
			}
			function deleteSlider($id){
				$query="SELECT * FROM `rithu_slider` WHERE `rithu_slider_id`='".$id."'";
					$rec=$this->fetchAll($query);
					unlink('valahouse_admn/upload/slider/'.$rec[0]['rithu_slider_photo']);
					
					$this->delete('rithu_slider','`rithu_slider_id`='.$id);
					
					
				
			}
			function deleteTsgallery($id){
				$query="SELECT * FROM `gallink` WHERE `gallink_id`='".$id."'";
					$rec=$this->fetchAll($query);
					unlink('valahouse_admn/upload/Tsgallery/'.$rec[0]['gallink_img']);
					
					$this->delete('gallink','`gallink_id`='.$id);
					
					
				
			}
			function deletGalleryList($id){
				$query="SELECT * FROM `gip_glry_type` WHERE `gip_glry_type_id`='".$id."'";
					$rec=$this->fetchAll($query);
					unlink('valahouse_admn/upload/gallery/'.$rec[0]['gip_glry_type_img']);
					$this->delete('gip_glry_type','`gip_glry_type_id`='.$id);
					
					
				
			}
			function deleteGallery($id){
				$query="SELECT * FROM `gallery` WHERE `gip_glry_id`='".$id."'";
					$rec=$this->fetchAll($query);
					
					$this->delete('gallery','`gip_glry_id`='.$id);
					
					
				
			}		

				function deleteGalimg($id){
				    	//	print_r($id);exit;
				$query="SELECT * FROM `gal_img` WHERE `gal_img_id`='".$id."'";
					$rec=$this->fetchAll($query);
				//	print_r($rec);exit;
			//	unlink('valahouse_admn/upload/gallery/'.$rec[0]['gal_img_photo']);
		//	print_r($id);exit;
						$this->delete('gal_img','`gal_img_id`='.$id);
				
				//	$this->delete('gal_img','`gal_img_id`='.$id);
					
					
				
			}	

	function deleteTour($id){
				$query="SELECT * FROM `tours_details` WHERE `tours_details_id`='".$id."'";
					$rec=$this->fetchAll($query);
									
					$this->delete('tours_details','`tours_details_id`='.$id);
					
					
				
			}


			function deletetour_img($id){
				$query="SELECT * FROM `tours_images` WHERE `tours_details_id`='".$id."'";
					$rec=$this->fetchAll($query);
					unlink('valahouse_admn/upload/Tour/'.$rec[0]['tours_img']);
					
					$this->delete('tours_images','`tours_details_id`='.$id);
					
					
				
			}

		function deleteAbtimg($id){
				$query="SELECT * FROM `abt_img` WHERE `abt_img_id`='".$id."'";
					$rec=$this->fetchAll($query);
					unlink('valahouse_admn/upload/About/'.$rec[0]['abt_img_image']);
					
					$this->delete('abt_img','`abt_img_id`='.$id);
					
					
				
			}
		function deleteCornacimg($id){
				$query="SELECT * FROM `cornacimg` WHERE `cornacimg_id`='".$id."'";
					$rec=$this->fetchAll($query);
					unlink('valahouse_admn/upload/Cornac/'.$rec[0]['cornacimg_img']);
					
					$this->delete('cornacimg','`cornacimg_id`='.$id);
					
					
				
			}
		function deletVirtualtour($id){
				$query="SELECT * FROM `virtual_tour` WHERE `virtual_tour_id`='".$id."'";
					$rec=$this->fetchAll($query);
					unlink('valahouse_admn/upload/virtualtour/'.$rec[0]['virtual_tour_img']);
					
					$this->delete('virtual_tour','`virtual_tour_id`='.$id);
					
					
				
			}

			function deleteActivity($id){
				$query="SELECT * FROM `activity` WHERE `activity_id`='".$id."'";
					$rec=$this->fetchAll($query);
					
					
					$this->delete('activity','`activity_id`='.$id);
					
					
				
			}	
	function deleteRooms($id){
				$query="SELECT * FROM `rooms` WHERE `rooms_id`='".$id."'";
					$rec=$this->fetchAll($query);
					
					
					$this->delete('rooms','`rooms_id`='.$id);
					
					
				
			}

			function deleteAcimg($id){
				$query="SELECT * FROM `actvty_img` WHERE `actvty_img_id`='".$id."'";
				//print_r($query);exit;
					$rec=$this->fetchAll($query);
					unlink('valahouse_admn/upload/Activity/'.$rec[0]['actvty_img_photo']);
					
					$this->delete('actvty_img','`actvty_img_id`='.$id);
					
					
				
			}
	function deleteRoomimg($id){
				$query="SELECT * FROM `room_img` WHERE `room_img_id`='".$id."'";
				//print_r($query);exit;
					$rec=$this->fetchAll($query);
					unlink('valahouse_admn/upload/rooms/'.$rec[0]['room_img_photo']);
					
					$this->delete('room_img','`room_img_id`='.$id);
					
					
				
			}


			function deleteCalendar($id){
				$query="SELECT * FROM `campbook` WHERE `campbook_id`='".$id."'";
					$rec=$this->fetchAll($query);
					
					
					$this->delete('campbook','`campbook_id`='.$id);
					
					
				
			}

			function deleteFacility($id){
				$query="SELECT * FROM `facility` WHERE `facility_id`='".$id."'";
					$rec=$this->fetchAll($query);
					
					
					$this->delete('facility','`facility_id`='.$id);
					
					
				
			}
			
			function deleteFacilityimg($id){
				$query="SELECT * FROM `fclty_img` WHERE `fclty_img_id`='".$id."'";
					$rec=$this->fetchAll($query);
					unlink('valahouse_admn/upload/Gallery/'.$rec[0]['fclty_img_file']);
					
					
					$this->delete('fclty_img','`fclty_img_id`='.$id);
					
					
				
			}
			function deleteAboutimg($id){
				$query="SELECT * FROM `abt_img` WHERE `abt_img_id`='".$id."'";
					$rec=$this->fetchAll($query);
					unlink('valahouse_admn/upload/Gallery/'.$rec[0]['abt_img_file']);
					
					
					$this->delete('abt_img','`abt_img_id`='.$id);
					
					
				
			}
			function deletePress($id){
				$query="SELECT * FROM `press` WHERE `about_img_id`='".$id."'";
					$rec=$this->fetchAll($query);
				
						$this->delete('press_img','`about_img`='.$id);
					$this->delete('press','`about_img_id`='.$id);
					
					
				
			}
			function deletePressimg($id){
				$query="SELECT * FROM `press_img` WHERE `about_img_id`='".$id."'";
					$rec=$this->fetchAll($query);
					unlink('valahouse_admn/upload/Gallery/'.$rec[0]['abt_img_file']);
					
					$this->delete('press_img','`abt_img_id`='.$id);
					
					
				
			}

		function deleteSpa($id){
				$query="SELECT * FROM `spa` WHERE `spa_id`='".$id."'";
					$rec=$this->fetchAll($query);
					
				$query="SELECT * FROM `spa_img` WHERE `spa_img_spa`='".$id."'";
				$rec=$this->fetchAll($query);
				for($i=0;$i<count($rec);$i++){
					unlink('valahouse_admn/upload/Spa/'.$rec[$i]['spa_img_img']);
                        }
					
					$this->delete('spa','`spa_id`='.$id);
					$this->delete('spa_img','`spa_img_spa`='.$id);
		
			}
		function deleteSpaimg($id){
			
					
				$query="SELECT * FROM `spa_img` WHERE `spa_img_id`='".$id."'";
				$rec=$this->fetchAll($query);
			
					unlink('valahouse_admn/upload/Spa/'.$rec[0]['spa_img_img']);
                        
					$this->delete('spa_img','`spa_img_id`='.$id);
		
			}


			function deleteAccom_img($id){
				$query="SELECT * FROM `accom_img` WHERE `accom_img_id`='".$id."'";
					$rec=$this->fetchAll($query);
					unlink('valahouse_admn/upload/Accomodation/'.$rec[0]['accom_img_img']);
					
					$this->delete('accom_img','`accom_img_id`='.$id);
					
					
				
			}
			

}