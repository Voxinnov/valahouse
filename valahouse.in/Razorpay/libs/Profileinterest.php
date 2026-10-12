<?php
	class Profileinterest extends MySql{
	

	function listProfileinterest(){
		
		
		$query = "SELECT * FROM `prof_intrst` WHERE `prof_intrst_id`!='' ORDER BY `prof_intrst_id` DESC";
		
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addProfileinterest($inputs){
					$insert	=	array('prof_intrst_sndr_id'=>$inputs['sender_id'],
										'prof_intrst_sndr_nme'=>$inputs['sndr_name'],
										'prof_intrst_rcvr_id'=>$inputs['rcvr_id'],
										'prof_intrst_rcvr_nme'=>$inputs['rcvr_name'],
									
										'prof_intrst_stus'=>1
										
							);
				//print_r($insert);exit;
				$this->insert($insert,"prof_intrst");	
				

				//print_r($insert);exit;
				return true;
				
				
			}

		function getInsert(){
		return $this->lastId;
	}
	
	/*
			 * Edit Testimonials
			*/			
			function aproveProfileinterest($id){
					$insert	=	array(
										'prof_intrst_stus'=>2,
										'prof_intrst_id'=>$id
							);
					//print_r	($insert);exit;	
		$this->update($insert,"prof_intrst",'`prof_intrst_id`='.$id);		
				return true;
			

							
			}
			
			
			function rejectProfileinterest($id){
					$insert	=	array(
										'prof_intrst_stus'=>0,
										'prof_intrst_id'=>$id
							);
							
							
				
		$this->update($insert,"prof_intrst",'`prof_intrst_id`='.$id);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
						
			}			
			

	 function getProfileinterest($id){
		$query	=	"SELECT * FROM `prof_intrst` WHERE `prof_intrst_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
		 function getProfileinterestalready($sid,$rid){
		$query	=	"SELECT * FROM `prof_intrst` WHERE `prof_intrst_sndr_id`='$sid' and `prof_intrst_rcvr_id`='$rid'  ";
	//	print_r($query);exit;
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllProfileinterestDetails()
	{
		$query = "SELECT * FROM  prof_intrst where  prof_intrst_stus=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}
function getAllProfileinterestDetailsalredyaccept($id)
	{
		$query = "SELECT * FROM  prof_intrst where  prof_intrst_stus=2 and prof_intrst_id=$id ";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}
	function getAllProfileinterestDetailsalredyreject($id)
	{
		$query = "SELECT * FROM  prof_intrst where  prof_intrst_stus=0 and prof_intrst_id=$id ";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}
	function getAllProfileinterestDetailsMax()
	{
		$query = "SELECT max(prof_intrst_id)as intst_id FROM  prof_intrst";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}


}
?>