<?php	 	

	class Job extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listJob(){
		
		
		$query = "SELECT * FROM `job_matrimny` c WHERE c.`job_id`!='' ORDER BY `job_id` DESC";
		
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addJob($inputs){
					$insert	=	array('job_caption'=>$this->addFilter($this->escapeHtml($inputs['title'])),
									  
									  'job_status'=>$inputs['status'],
										);
				
				$this->insert($insert,"job_matrimny");	
				

				//print_r($insert);exit;
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editJob($inputs){
					$insert	=	array('job_caption'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										
										'job_status'=>$inputs['status'],
										'job_id'=>$inputs['id']
							);
							
							
				
		$this->update($insert,"job_matrimny",'`job_id`='.$inputs['id']);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
								
			
			
				
			}



	 function getJob($id){
		$query	=	"SELECT * FROM `job_matrimny` WHERE job_id=$id ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllJobDetails()
	{
		$query = "SELECT * FROM  job_matrimny where  job_status=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}


}
?>