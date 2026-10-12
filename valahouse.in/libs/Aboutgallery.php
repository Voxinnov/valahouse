<?php	 	

	class Aboutgallery extends MySql{
	

	
	function listAboutgallery(){
		
		



		$query = "SELECT * FROM `about_img` WHERE `about_img_id`!=''  ORDER BY `about_img_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addAboutgallery($inputs){
					$insert	=	array('about_img_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										
										'about_img_status'=>$inputs['status']										
										);
				//print_r($insert);exit;
				$this->insert($insert,"about_img");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Add Testimonials
			*/			
			function addAboutgalleryimg($inputs){
					$insert	=	array('abt_img_file'=>$this->addFilter($this->escapeHtml($inputs['photo'])),
										
										'about_img'=>$inputs['gallery']
							);
				//print_r($insert);exit;
				$this->insert($insert,"abt_img");	
				return true;
			}
	/*
			 * Edit Testimonials
			*/			
			function editAboutgallery($inputs){
					$insert	=	array('about_img_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										
										//'gip_glry_folder'=>$inputs['folder'],
										'about_img_status'=>$inputs['status'],
										'about_img_id'=>$inputs['id']
							);
				//print_r($insert);exit;
				$this->update($insert,"about_img",'`about_img_id`='.$inputs['id']);		
				return true;
			}

	function updateAboutgalleryImage($id,$image){
		 $this->update(array('gip_glry_img'=>$image),'about_img','`about_img_id`='.$id);
	}
	 function getAboutgallery($id){
		$query	=	"SELECT * FROM `about_img` WHERE `about_img_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllAboutgalleryDetails()
	{
		$query = "SELECT * FROM about_img WHERE about_img_status =1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}



  function getAllAboutgalleryMax()
    {
        $query = "SELECT max(about_img_id) as max_id FROM `about_img`";
        $rec = $this->fetchAll($query);
        return $rec;  
        //print_r($query)exit;  
    }



		
					function listAllAboutgallery($id){
		
		



		$query = "SELECT * FROM `about_img` INNER JOIN abt_img ON about_img_id = about_img WHERE `about_img_id`='$id' and about_img=1 ORDER BY `about_img_id` DESC";
	//	print_r($query);exit;	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;
		
		
		
	

}
					function listAllAboutgalleryALL(){
		
		



		$query = "SELECT * FROM `about_img` INNER JOIN abt_img ON about_img_id = about_img ORDER BY `about_img_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;
		//print_r($query);exit;		
		
		
	

}
/////////////////////////////////////////////////////////////////////////////////////////////////
         function addGalimg($inputs){
                    $insert =   array('abt_img_file'=>$this->addFilter($this->escapeHtml($inputs['photo'])),
                                       'abt_img_order'=>0,
                                       'about_img'=>$inputs['gallery']
                                        );
                //print_r($insert);exit;
                $this->insert($insert,"abt_img");    
                
                return true;
                
                
            }


    /*
             * Edit Testimonials
            */          
            function editGalimg($inputs){
                    $insert = array(  	'abt_img_name'=>$inputs['imgname'],	
                                        'abt_img_order'=>$inputs['order'],    
                                        'abt_img_id'=>$inputs['id']
                            );
                $this->update($insert,"abt_img",'`abt_img_id`='.$inputs['id']);       
                return true;
                //print_r($insert);exit;
            }

    function updateGalleryImage($id,$image,$order,$imgname){
       // print_r($order);
        //print_r($id);
       // exit;
         $this->update(array('abt_img_file'=>$image,'abt_img_order'=>$order,'abt_img_name'=>$imgname),'abt_img','`abt_img_id`='.$id);
    }
     function getGalimg($id){
        $query  =   "SELECT * FROM `abt_img` WHERE `abt_img_id`='$id'  ";
        $rec        =   $this->fetchAll($query);
        return $rec;
    }
    function getGalimg_act($id){
        $query  =   "SELECT * FROM `abt_img` WHERE `about_img`='$id'  ";
        $rec        =   $this->fetchAll($query);
        return $rec;
        //print_r($query);exit;
    }
    function getAllGalimgDetails()
    {
        $query = "SELECT * FROM abt_img where abt_img_order!=0 order by abt_img_order";
        $rec = $this->fetchAll($query);
        //print_r($rec);exit;
        return $rec;    
    }



	}
?>