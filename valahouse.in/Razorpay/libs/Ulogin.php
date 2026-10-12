<?php
	class Ulogin extends MySql{
	


function getUlogin($id){
		$query	=	"SELECT * FROM `mtrimny_signup` WHERE `signup_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		//print_r($query);exit;
		return $rec;
	}

	
	function userRegisteralready($array){
		$signup_email	=	$array['signup_email'];
		$signup_phno	=	$array['signup_phno'];
		
	 //print($array["email"]);exit;
		 $query	=	"SELECT * FROM `mtrimny_signup` WHERE  `signup_email`= '".$signup_email."' and 
		              signup_phno = '".$signup_phno."'";
					// print($query);exit;
		 $rec		=	$this->fetchAll($query);
		//print($query);exit;
		 return $rec;
}
function userLogin($array){
		$this->signin_email	=	$array["signin_email"];

		$this->signin_password	=	$array["signin_password"];
	
$query	=	"SELECT * FROM `mtrimny_signup` WHERE `signup_email`='".$this->addFilter($this->signin_email)."' AND signup_status=1 OR signup_phno = '".$this->addFilter($this->signin_email)."'  and BINARY signup_password = BINARY '".$this->addFilter($this->signin_password)."' AND signup_status=1    ";
		         //  print_r($query); exit;
		 $rec		=	$this->fetchAll($query);
	//print_r($rec); exit;
	
		if(count($rec)>0){
			
			$signin_password	=	$array["signin_password"];
			if($signin_password==$rec[0]["signup_password"]){
				$this->adminID	=	$rec[0]["signup_id"];
				$this->userName	=	$rec[0]["signup_email"];
				$this->userPhone	=	$rec[0]["signup_phno"];
				//$this->adminStatus	=	$rec[0]["status"];
				
				 $rec[0]["signup_id"];
				// $rec[0]["email"];
				 $rec[0]["user_name"];
				 $rec[0]["password"];
				// $rec[0]["status"];
				//$this->dateCreated		=	$rec[0]["date_create"];				
				return true;
			}	
		}		
		return false;
	}
	
	function listUlogin(){
		
		
		$query = "SELECT * FROM `mtrimny_signup` c WHERE c.`signup_id`!='' and signup_status!=3 ORDER BY `signup_id` DESC";
		
		$rec	=	$this->fetchAll($query);
	
		//print_r(expression)
		return $rec;		
		
		
	}

	 /* listProfilecatmale
			*/	
	function listUlogincatm($cast,$age){
		
		
		$query = "SELECT * FROM `mtrimny_signup`  WHERE prof_gender='m'and prof_cast ='$cast' and signup_status=1 and prof_age >= $age  ORDER BY `signup_id` DESC";
	//print_r($query);exit;
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
		function listUloginrlgnm($relgn,$age,$cast){
		
		
		$query = "SELECT * FROM `mtrimny_signup`  WHERE prof_gender='m'and  prof_religion ='$relgn' and signup_status=1 and prof_cast !='$cast' and prof_age >= $age  ORDER BY `signup_id` DESC";
		//print_r($query);exit;
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}

/* end listProfilecatmale
			*/	

 /* listProfilecatfemale
			*/


	function listUlogincatf($cast,$age){
		
		
		$query = "SELECT * FROM `mtrimny_signup`  WHERE prof_gender='f'and prof_cast ='$cast' and signup_status=1 and prof_age <= $age  ORDER BY `signup_id` DESC";
		//print_r($query);exit;
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
		function listUloginrlgnf($relgn,$age,$cast){
		
		
		$query = "SELECT * FROM `mtrimny_signup`  WHERE prof_gender='f'and  prof_religion ='$relgn' and signup_status=1 and prof_cast !='$cast' and prof_age <= $age  ORDER BY `signup_id` DESC";
		
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	

 /* listProfilecatfemale
			*/

	
	 /* Add Testimonials
			*/			
			function addUlogin($inputs){
					$insert	=	array('signup_email'=>$this->addFilter($this->escapeHtml($inputs['signup_email'])),
					            'signup_name'=>$this->addFilter($this->escapeHtml($inputs['name'])),
									
										'signup_phno'=>$inputs['signup_phno'],
								'signup_password'=>$inputs['signup_password'],
										'signup_otp'=>$inputs['signup_otp'],
										'signup_status'=>1
										
										
							);
				//print_r($insert);exit;
				$this->insert($insert,"mtrimny_signup");	
				

				//print_r($insert);exit;
				return true;
				
				
			}

		function getInsert(){
		return $this->lastId;
	}
	
	/*
			 * Edit Testimonials
			*/			
			function editUlogin($inputs){
					$insert	=	array(
								'signup_password'=>$inputs['signup_password']
							);
							
		$this->update($insert,"mtrimny_signup",'`signup_id`='.$inputs['id']);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
				
			}
				function editUlogins($inputs){
					$insert	=	array(
								'signup_status'=>1
							);
							
		$this->update($insert,"mtrimny_signup",'`signup_id`='.$inputs['id']);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
				
			}
			
				function getUlogins($id)
	{
		$query = "SELECT * FROM  mtrimny_signup where signup_id=$id signup_status=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}
	
			
			function addUlogintrash($inputs){
					$insert	=	array(
										'signup_status'=>$inputs['status'],
										'signup_id'=>$inputs['id']
							);
							
							
				
		$this->update($insert,"mtrimny_signup",'`signup_id`='.$inputs['a_id']);		
				return true;
			

							//print_r($inputs);exit;
			
				
			}	
			
			
			function updateUlogin($inputs){
					$insert	=	array(
										'signup_status'=>0,
										'signup_id'=>$inputs['id']
							);
							
							
				
		$this->update($insert,"mtrimny_signup",'`signup_id`='.$inputs['a_id']);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
			
				
			}			
			


	 
	function getAllUloginDetails()
	{
		$query = "SELECT * FROM  mtrimny_signup where  signup_status=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}
	
		function getUloginforgot($username)
	{
	    
		//$this->signin_email	=	$array["signin_email"];

		$query = "SELECT * FROM  mtrimny_signup where `signup_email`=BINARY '".$username."' AND signup_status=1 OR  BINARY signup_phno = BINARY '".$username."' AND signup_status=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}
function getAllUloginDetailsTrash()
	{
		$query = "SELECT * FROM  mtrimny_signup where  signup_status=3";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}
	function getAllUloginMax()
	{
		$query = "SELECT max(signup_id) as max_id FROM `mtrimny_signup`";
		$rec = $this->fetchAll($query);
		return $rec;	

		//print_r($query);exit;
	}	
	

}
?>