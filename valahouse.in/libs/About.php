<?php	 	

	class About extends MySql{
	
	

			
	
	
	/*
			 * Edit Testimonials
			*/			
		function editAbout($inputs){
		$insert	=	array('abt_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										'abt_dscrpn'=>$inputs['dscrptn'],
										'abt_stus'=>$inputs['status']
										
										
										
							);
						//	print_r($insert); exit;	
				$this->update($insert,"about",'`abt_id`='.$inputs['id']);		
				return true;
			}
	


	function getAbout(){
		$query	=	"SELECT * FROM `about` where abt_id=1";

		$rec		=	$this->fetchAll($query);
		return $rec;
	}

	function getAboutterms($id){
		$query	=	"SELECT * FROM `about` where abt_id=$id";

		$rec		=	$this->fetchAll($query);
		return $rec;
	}

	function getAllAboutDetails()
	{
		$query = "SELECT * FROM about where abt_stus=1";
		$rec = $this->fetchAll($query);
		return $rec;	
	}
	
}
?>