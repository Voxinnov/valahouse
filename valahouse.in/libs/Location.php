<?php	 	

	class Location extends MySql{
	
	
	

	/*
			 * Edit Testimonials`
			*/			
			function editLocation($inputs){
					$insert	=	array(/*'cndt_id'=>$this->addFilter($inputs['email']),*/
												//'cndt_title'=>$this->addFilter($inputs['title']),											
												'cnt_adrs'=>$this->addFilter($inputs['address']),
												'cnt_no'=>$inputs['phn'],
												'cnt_bno'=>$inputs['bphn'],
												'cnt_ono'=>$inputs['ophn'],
												'cnt_email'=>$this->addFilter($inputs['email']),
												'cnt_lcn'=>$this->addFilter($inputs['contact_map']),
												'cnt_fb'=>$this->addFilter($inputs['fb']),
												'cnt_twtr'=>$this->addFilter($inputs['twtr']),
												'cnt_insta'=>$this->addFilter($inputs['insta']),
												'cnt_ytb'=>$this->addFilter($inputs['ytb']),
												'cnt_vemio'=>$this->addFilter($inputs['vemio']),
												'cnt_flckr'=>$this->addFilter($inputs['flkr']),
												'cnt_blgr'=>$this->addFilter($inputs['blgr']),
												'cnt_ytv'=>$this->addFilter($inputs['ytbv']),
												'cnt_distnc'=>$this->addFilter($inputs['distnc']),
												'cnt_trpadv'=>$this->addFilter($inputs['trpadv']),
										'cnt_id'=>$inputs['id']
							);
						//	print_r($insert);exit;
				$this->update($insert,"contact",'`cnt_id`='.$inputs['id']);			
				//$this->update($insert,"contact",'`cndt_id`='.$inputs['id']);		
				return true;
			}

	
	 function getLocation(){
		$query	=	"SELECT * FROM `contact`";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	
}
?>