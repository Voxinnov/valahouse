<?php	 	

	class Edu extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listEdu(){
		
		
		$query = "SELECT * FROM `edu_matrimny` c WHERE c.`edu_id`!='' ORDER BY `edu_id` DESC";
		
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addEdu($inputs){
					$insert	=	array('edu_caption'=>$this->addFilter($this->escapeHtml($inputs['title'])),
									  
									  'edu_status'=>$inputs['status'],
										);
				
				$this->insert($insert,"edu_matrimny");	
				

				//print_r($insert);exit;
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editEdu($inputs){
					$insert	=	array('edu_caption'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										
										'edu_status'=>$inputs['status'],
										'edu_id'=>$inputs['id']
							);
							
							
				
		$this->update($insert,"edu_matrimny",'`edu_id`='.$inputs['id']);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
								
			
			
				
			}



	 function getEdu(){
		$query	=	"SELECT * FROM `edu_matrimny`  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllEduDetails()
	{
		$query = "SELECT * FROM  edu_matrimny where  edu_status=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}


}
?>