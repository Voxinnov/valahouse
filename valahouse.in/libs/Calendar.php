<?php	 	

	class Calendar extends MySql{
	
	
	function listCalendar(){
	
		$query = "SELECT * FROM `campbook` c WHERE c.`campbook_id`!='' ORDER BY `campbook_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
	//print($query);exit;

	}

	

function listCalendaremp($id){
	
		$query = "SELECT * FROM `campbook` c WHERE `campbook_addby`='$id'   ORDER BY `campbook_id` DESC";
		//print($query);exit;
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}


	function userRegisteralready($email){
		//$this->email	=	$array["email"];
	
		 $query	=	"SELECT * FROM `campbook` WHERE BINARY `campbook_mail`= BINARY $email";
		 $rec		=	$this->fetchAll($query);
		// print($rec);exit;
		 return $rec;
}

	
	 /* Add Testimonials
			*/			
			function addCalendar($inputs){
					$insert	=	array('campbook_sdate'=>$this->addFilter($this->escapeHtml($inputs['sdate'])),
										'campbook_edate'=>$this->addFilter($this->escapeHtml($inputs['edate'])),
										'campbook_no_clints'=>$inputs['cno'],
										'campbook_no_rom'=>$inputs['rno'],
										'campbook_addby'=>$inputs['addby'],
										'campbook_stts'=>$inputs['status']
										);
				//print_r($insert);exit;
				$this->insert($insert,"campbook");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editCalendar($inputs){
					$insert	=	array('campbook_sdate'=>$this->addFilter($this->escapeHtml($inputs['sdate'])),
										'campbook_edate'=>$this->addFilter($this->escapeHtml($inputs['edate'])),
										'campbook_no_clints'=>$inputs['cno'],
										'campbook_no_rom'=>$inputs['rno'],
										'campbook_addby'=>$inputs['addby'],
										'campbook_stts'=>$inputs['status']
										
							);
							//print_r($insert);exit;
				$this->update($insert,"campbook",'`campbook_id`='.$inputs['id']);		
				return true;
			}

	
	 function getCalendar($id){
		$query	=	"SELECT * FROM `campbook` WHERE `campbook_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
		//print_r($query);exit;
	}
	function getAllCalendarDetails()
	{
		$query = "SELECT * FROM campbook where  campbook_status=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}

}
?>