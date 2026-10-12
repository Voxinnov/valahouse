<?php	 	

	class Acmdtn extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	
	/*
			 * Edit Testimonials
			*/			
		function editAcmdtn($inputs){
		$insert	=	array('acc_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										'acc_dscrptn'=>$inputs['dscrptn'],
										'acc_stus'=>$inputs['status']
										
										
										
							);
							//print_r($insert); exit;	
				$this->update($insert,"accomodation",'`acc_id`='.$inputs['id']);		
				return true;
			}
	


	function getAcmdtn(){
		$query	=	"SELECT * FROM `accomodation`";

		$rec		=	$this->fetchAll($query);
		return $rec;
	}

	function getAllAcmdtnDetails()
	{
		$query = "SELECT * FROM accomodation where acc_stus=1";
		$rec = $this->fetchAll($query);
		return $rec;	
	}
	
}
?>