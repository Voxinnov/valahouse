<?php	 	

	class About extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	
	/*
			 * Edit Testimonials
			*/			
		function editAbout($inputs){
		$insert	=	array('otm_abt_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										'otm_abt_dscr'=>$inputs['dscrptn']
										
										
										
										
							);
							//print_r($insert); exit;	
				$this->update($insert,"otm_abt",'`otm_abt_id`='.$inputs['id']);		
				return true;
				}

	function getAbout(){
		$query	=	"SELECT * FROM otm_abt";

		$rec		=	$this->fetchAll($query);
		return $rec;
	}

	
}


?>