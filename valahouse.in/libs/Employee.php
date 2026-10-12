<?php	 	

	class Employee extends MySql{
	
	
	function listEmployee(){
		
		
		


		$query = "SELECT * FROM `emp` c WHERE c.`emp_id`!='' ORDER BY `emp_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	function userRegisteralready($email){
		//$this->email	=	$array["email"];
	
		 $query	=	"SELECT * FROM `emp` WHERE BINARY `emp_mail`= BINARY $email";
		 $rec		=	$this->fetchAll($query);
		// print($rec);exit;
		 return $rec;
}

	
	 /* Add Testimonials
			*/			
			function addEmployee($inputs){
					$insert	=	array('emp_name'=>$this->addFilter($this->escapeHtml($inputs['name'])),
										'emp_mail'=>$this->addFilter($this->escapeHtml($inputs['email'])),
										'emp_pass'=>$inputs['pass'],
										'emp_status'=>$inputs['status'],
										);
				//print_r($insert);exit;
				$this->insert($insert,"emp");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editEmployee($inputs){
					$insert	=	array('emp_name'=>$this->addFilter($this->escapeHtml($inputs['name'])),
										'emp_pass'=>$inputs['photo'],
										'emp_status'=>$inputs['status'],
										'emp_id'=>$inputs['id']
							);
							//print_r($insert);exit;
				$this->update($insert,"emp",'`emp_id`='.$inputs['id']);		
				return true;
			}

	
	 function getEmployee($id){
		$query	=	"SELECT * FROM `emp` WHERE `emp_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllEmployeeDetails()
	{
		$query = "SELECT * FROM emp where  emp_status=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}

}
?>