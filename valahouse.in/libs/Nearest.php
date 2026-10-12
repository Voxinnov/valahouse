<?php	 	

	class Nearest extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listNearest(){
		
		
		


		$query = "SELECT * FROM `nrst_plce` c WHERE c.`nr_id`!='' ORDER BY `nr_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	  }
	 /* Add Testimonials
			*/			
			function addNearest($inputs){
		$insert	=	array('nr_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										'nr_dscrptn'=>$inputs['description'],
										'nr_image'=>$inputs['photo'],
										'nr_stus'=>$inputs['status'],
										);
				//print_r($insert);exit;
				$this->insert($insert,"nrst_plce");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editNearest($inputs){
	$insert	=	array('nr_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										'nr_dscrptn'=>$inputs['description'],	
										'nr_image'=>$inputs['photo'],
										'nr_stus'=>$inputs['status']
										);
	//print_r($insert);exit;
				$this->update($insert,"nrst_plce",'`nr_id`='.$inputs['id']);		
				return true;
			}

	function updateGalleryImage($id,$image){
		 $this->update(array('nr_image'=>$image),'nrst_plce','`nr_id`='.$id);
	}
	 function getNearest($id){
		$query	=	"SELECT * FROM `nrst_plce` WHERE `nr_id`='$id'";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	
	function getAllNearestDetails()
	{
		$query = "SELECT * FROM nrst_plce where nr_stus=1";
		$rec = $this->fetchAll($query);
		return $rec;	
	}

}
?>