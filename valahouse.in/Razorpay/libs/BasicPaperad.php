<?php
	class BasicPaperad extends MySql{
	
	
	function listBasicPaperad(){
		
		
		$query = "SELECT * FROM `basic_ppr_ads_onetm` c WHERE c.`bsic_ads_id`!='' ORDER BY `bsic_ads_id` DESC";
		
		$rec	=	$this->fetchAll($query);
	
		//print_r(expression)
		return $rec;		
		
		
	}

	 /* listProfilecatmale
			*/	
	function listBasicPaperadcatm(){
		
		
		$query = "SELECT * FROM `basic_ppr_ads_onetm` WHERE `bsic_ads_id`!=''   ORDER BY `bsic_ads_id` DESC";
	//print_r($query);exit;
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
/* 		function listBasicPaperadrlgnm($relgn,$age,$cast){
		
		
		$query = "SELECT * FROM `basic_ppr_ads_onetm`  WHERE bsic_ads_gnder='m'and  prof_religion ='$relgn' and bsic_ads_stats=1 and bsic_ads_description !='$cast' and prof_age >= $age  ORDER BY `bsic_ads_id` DESC";
		//print_r($query);exit;
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	} */

/* end listProfilecatmale
			*/	

 /* listProfilecatfemale
			*/


	function listBasicPaperadcatf($cast,$age){
		
		
		$query = "SELECT * FROM `basic_ppr_ads_onetm`  WHERE bsic_ads_gnder='f'and bsic_ads_description ='$cast' and bsic_ads_stats=1 and prof_age <= $age  ORDER BY `bsic_ads_id` DESC";
		//print_r($query);exit;
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}

	

 /* listProfilecatfemale
			*/

	
	 /* Add Testimonials
			*/			
			function addBasicPaperad($inputs){
					$insert	=	array('bsic_ads_relign'=>$this->addFilter($this->escapeHtml($inputs['religion'])),
										
										'bsic_ads_gnder'=>$inputs['gender'],
										
									
										'bsic_ads_description'=>$inputs['description'],
										
										'bsic_ads_imge'=>$inputs['photo'],
										'bsic_ads_stats'=>$inputs['status'],
										
							);
				//print_r($insert);exit;
				$this->insert($insert,"basic_ppr_ads_onetm");	
				

				//print_r($insert);exit;
				return true;
				
				
			}

		function getInsert(){
		return $this->lastId;
	}
	
	/*
			 * Edit Testimonials
			*/			
			function editBasicPaperad($inputs){
					$insert	=	array(
										'bsic_ads_relign'=>$this->addFilter($this->escapeHtml($inputs['religion'])),
										
										'bsic_ads_gnder'=>$inputs['gender'],
										
										
										'bsic_ads_description'=>$inputs['description'],
										
										'bsic_ads_imge'=>$inputs['photo'],
										'bsic_ads_stats'=>$inputs['status'],
										'bsic_ads_id'=>$inputs['id']
							);
							
		$this->update($insert,"basic_ppr_ads_onetm",'`bsic_ads_id`='.$inputs['id']);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
				
			}
			
	
			
function updateGalleryImage($id,$image){
		 $this->update(array('bsic_ads_imge'=>$image),'basic_ppr_ads_onetm','`bsic_ads_id`='.$id);
	}

	 function getBasicPaperad($id){
		$query	=	"SELECT * FROM `basic_ppr_ads_onetm` WHERE `bsic_ads_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		//print_r($query);exit;
		return $rec;
	}
	function getAllBasicPaperadDetails()
	{
		$query = "SELECT * FROM  basic_ppr_ads_onetm where  bsic_ads_stats=1 ORDER BY `bsic_ads_id` DESC";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}
	
function ListAllbasicadprof($gender,$religion){
		$query	=	"SELECT * FROM `basic_ppr_ads_onetm`    WHERE bsic_ads_gnder='$gender' and bsic_ads_relign = '$religion'";
		//print_r($query);exit;
		$rec		=	$this->fetchAll($query);
		return $rec;
				
			}		

}	
	
	


?>