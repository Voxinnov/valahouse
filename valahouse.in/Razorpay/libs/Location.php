<?php	 	

	class Location extends MySql{
	
	
	

	/*
			 * Edit Testimonials
			*/			
			function editLocation($inputs){
					$insert	=	array(/*'cndt_id'=>$this->addFilter($inputs['email']),*/
												//'cndt_title'=>$this->addFilter($inputs['title']),											
												'jspr_cntct_addr'=>$this->addFilter($inputs['address']),
												'jspr_cntct_phn'=>$inputs['phn'],
												'jspr_cntct_email'=>$this->addFilter($inputs['email']),
												'jspr_cntct_map'=>$this->addFilter($inputs['contact_map']),
												'jspr_cntct_fb'=>$this->addFilter($inputs['fb']),
												'jspr_cntct_twtr'=>$this->addFilter($inputs['twtr']),
												'jspr_cntct_intagrm'=>$this->addFilter($inputs['insta']),
												'jspr_cntct_ytb'=>$this->addFilter($inputs['ytb']),
												
										
										'jspr_cntct_id'=>$inputs['id']
							);
							//print_r($insert);exit;
				$this->update($insert,"jspr_contact",'`jspr_cntct_id`='.$inputs['id']);			
				//$this->update($insert,"jspr_contact",'`cndt_id`='.$inputs['id']);		
				return true;
			}

	
	 function getLocation(){
		$query	=	"SELECT * FROM `jspr_contact`";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	
}
?>