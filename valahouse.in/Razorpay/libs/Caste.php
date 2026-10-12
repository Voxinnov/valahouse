<?php	 	

	class Caste extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('mtrimny_caste','`mtrimny_caste_id`='.$list[$i]);
					}
			}	
			
			
	
	function listCaste(){
		
		
		$query = "SELECT * FROM `mtrimny_caste` c WHERE c.`mtrimny_caste_id`!='' ORDER BY `mtrimny_caste_id` DESC";
		
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Castes
			*/			
				function addCaste($inputs){
					$insert	=	array('mtrimny_caste_religion'=>$this->addFilter($this->escapeHtml($inputs['religion'])),
										'mtrimny_caste_cst'=>$inputs['caste'],
									'mtrimny_caste_status'=>$inputs['status']
										
							);
				
				$this->insert($insert,"mtrimny_caste");	
				

				//print_r($insert);exit;
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Castes
			*/			
			function editCaste($inputs){
					$insert	=	array('mtrimny_caste_religion'=>$this->addFilter($this->escapeHtml($inputs['religion'])),
										'mtrimny_caste_cst'=>$inputs['caste'],
									'mtrimny_caste_status'=>$inputs['status'],
										'mtrimny_caste_id'=>$inputs['id']
							);
							
							
				
		$this->update($insert,"mtrimny_caste",'`mtrimny_caste_id`='.$inputs['id']);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
								
			
			
				
			}

	 function getCaste($id){
		$query	=	"SELECT * FROM `mtrimny_caste` WHERE `mtrimny_caste_id`=$id ";
	//	print_r($query);
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getCastebyreli($id){
		$query	=	"SELECT * FROM `mtrimny_caste` WHERE `mtrimny_caste_religion`='$id' and mtrimny_caste_status=1 ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllCasteDetails()
	{
		$query = "SELECT * FROM  mtrimny_caste where  mtrimny_caste_status=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}

}
?>