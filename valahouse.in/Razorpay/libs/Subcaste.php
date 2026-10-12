<?php	 	

	class Subcaste extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listSubcaste(){
		
		
		


		$query = "SELECT * FROM mtrimny_subcaste c WHERE c.`subcaste_id`!='' ORDER BY `subcaste_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	  }

	  		function listSubcasteEmp($id){
		
		
		$query = "SELECT * FROM `mtrimny_subcaste`  WHERE `subcaste_id`!='' and caste_cata like '%$id%' or caste_cata=$id ORDER BY `subcaste_id` DESC";
	//print_r($query);exit;
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
				
	}
	 /* Add Testimonials
			*/			
			function addSubcaste($inputs){
	$insert	=	array('subcaste'=>$inputs['subcaste'],
							'caste_cata'=>$inputs['catogory'],
							'subcaste_status'=>$inputs['status']
										);
				//print_r($insert);exit;
				$this->insert($insert,"mtrimny_subcaste");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editSubcaste($inputs){
	$insert	=	array('caste_cata'=>$inputs['catogory'],
										'subcaste'=>$inputs['subcaste'],
										'subcaste_status'=>$inputs['status']
										);
	//print_r($insert);exit;
				$this->update($insert,"mtrimny_subcaste",'`subcaste_id`='.$inputs['id']);		
				return true;
			}

/*	function updateGalleryImage($id,$image){
		 $this->update(array('Subcaste_img'=>$image),'Subcaste','`subcaste_id`='.$id);
	}*/
	 function getSubcaste($id){
		$query	=	"SELECT * FROM mtrimny_subcaste WHERE `subcaste_id`='$id' ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getSubcastebyid($id){
		$query	=	"SELECT * FROM mtrimny_subcaste WHERE `caste_cata`='$id' and subcaste_status=1";
		print_r($query);exit;
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllSubcasteDetails()
	{
		$query = "SELECT * FROM mtrimny_subcaste where subcaste_status=1";
		$rec = $this->fetchAll($query);
		return $rec;	
	}
	function getAllSubcasteMax()
	{
		$query = "SELECT max(subcaste_id) as max_id FROM mtrimny_subcaste";
		$rec = $this->fetchAll($query);
		return $rec;	
	}

}
?>