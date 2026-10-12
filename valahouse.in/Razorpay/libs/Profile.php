<?php
	class Profile extends MySql{
	
	
	function userRegisteralready($array){
		$email	=	$array['email'];
		$contno	=	$array['contno'];
		
	 //print($array["email"]);exit;
		 $query	=	"SELECT * FROM `mtrimny_register` WHERE BINARY `prof_email`= BINARY '".$email."' and 
		             BINARY prof_cndtno = BINARY '".$contno."'";
					// print($query);exit;
		 $rec		=	$this->fetchAll($query);
		//print($query);exit;
		 return $rec;
}
function userLogin($array){
		$this->email	=	$array["email"];
		$this->password	=	$array["password"];
	
		 $query	=	"SELECT * FROM `mtrimny_register` WHERE BINARY `prof_email`=BINARY '".$this->addFilter($this->email)."' and 
		             BINARY prof_password = BINARY '".$this->addFilter($this->password)."' ";
		           // print_r($query); exit;
		 $rec		=	$this->fetchAll($query);
	//print_r($rec); exit;
	
		if(count($rec)>0){
			
			$password	=	$array["password"];
			if($password==$rec[0]["prof_password"]){
				$this->adminID	=	$rec[0]["prof_id"];
				$this->userName	=	$rec[0]["prof_email"];
				//$this->adminStatus	=	$rec[0]["status"];
				
				 $rec[0]["id"];
				// $rec[0]["email"];
				 $rec[0]["user_name"];
				 $rec[0]["password"];
				// $rec[0]["status"];
				//$this->dateCreated		=	$rec[0]["date_create"];				
				return true;
			}	
		}		
		return false;
	}
	
	function listProfile(){
		
		
		$query = "SELECT * FROM `mtrimny_register` c WHERE c.`m_id`!='' and m_status!=3 ORDER BY `m_id` DESC";
		
		$rec	=	$this->fetchAll($query);
	
		//print_r(expression)
		return $rec;		
		
		
	}
	function listProfilesamp(){
		
		
		$query = "SELECT * FROM `mtrimny_register` c WHERE m_status=1 and m_id!='' and m_prof_photo!=' ' ORDER BY `m_id` DESC";
			//print_r($query);
		$rec	=	$this->fetchAll($query);
	
	
		return $rec;		
		
		
	}
	 /* listProfilecatmale
			*/	
	function listProfilecatm($cast,$age){
		
		
		$query = "SELECT * FROM `mtrimny_register`  WHERE prof_gender='m'and prof_cast ='$cast' and m_status=1 and prof_age >= $age  ORDER BY `prof_id` DESC";
	//print_r($query);exit;
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
		function listProfilerlgnm($relgn,$age,$cast){
		
		
		$query = "SELECT * FROM `mtrimny_register`  WHERE prof_gender='m'and  prof_religion ='$relgn' and m_status=1 and prof_cast !='$cast' and prof_age >= $age  ORDER BY `prof_id` DESC";
		//print_r($query);exit;
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}

/* end listProfilecatmale
			*/	

 /* listProfilecatfemale
			*/


	function listProfilecatf($cast,$age){
		
		
		$query = "SELECT * FROM `mtrimny_register`  WHERE prof_gender='f'and prof_cast ='$cast' and m_status=1 and prof_age <= $age  ORDER BY `prof_id` DESC";
		//print_r($query);exit;
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
		function listProfilerlgnf($relgn,$age,$cast){
		
		
		$query = "SELECT * FROM `mtrimny_register`  WHERE prof_gender='f'and  prof_religion ='$relgn' and m_status=1 and prof_cast !='$cast' and prof_age <= $age  ORDER BY `prof_id` DESC";
		
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	

 /* listProfilecatfemale
			*/

	
	 /* Add Testimonials
			*/			
			function addProfile($inputs){
					$insert	=	array('m_name'=>$this->addFilter($this->escapeHtml($inputs['name'])),
										'm_profile'=>$inputs['type'],
										'm_rltn'=>$inputs['rltn'],
										'm_relgon'=>$inputs['relgn'],
										'm_cast'=>$inputs['cast'],
										'm_subcst'=>$inputs['subcst'],
										'm_baptized'=>$inputs['baptized'],
										'm_gender'=>$inputs['gender'],
										'm_mtng'=>$inputs['mthrtng'],
						'crntly_fellwshp_cntry'=>$inputs['fllwshp_country'],
							'crntly_fellwshp_state'=>$inputs['fellwshp_state'],
					'crntly_fellwshp_chrchnme'=>$inputs['fellwshp_lclchrchnme'],
								'native_checkbox'=>$inputs['native_checkbox'],
								'nativeplace_cntry'=>$inputs['native_country'],
								'nativeplace_state'=>$inputs['native_state'],
						'nativeplace_chrchnme'=>$inputs['native_lcalchurchnme'],
										'nativeplace_fname'=>$inputs['fname'],
							'nativeplace_fthrsocption'=>$inputs['fther_occptn'],
										'nativeplace_mname'=>$inputs['mname'],
							'nativeplace_mthrsocption'=>$inputs['mthr_ocptn'],
										'm_brother'=>$inputs['brother'],
										'm_sister'=>$inputs['sister'],
										'm_fmlytyp'=>$inputs['fmlytyp'],
										'm_cntry'=>$inputs['m_country'],
										'm_state'=>$inputs['m_state'],
								'm_loclplacenme'=>$inputs['m_lcalplacename'],
											'm_dob'=>$inputs['m_dob'],
										'm_maritalstus'=>$inputs['m_mrtalstus'],
										'm_height'=>$inputs['m_hght'],
										'm_weight'=>$inputs['m_wght'],
										'm_clr'=>$inputs['m_clr'],
										'm_heighestedu'=>$inputs['m_hgstedu'],
										'm_job'=>$inputs['m_job'],
									'laststdy_cntry'=>$inputs['lststdy_cntry'],
									'laststdy_state'=>$inputs['lststdy_state'],
					'laststdy_loclplacenme'=>$inputs['lststdy_lcalplacename'],
								'currntlctn_cntry'=>$inputs['crntlctn_cntry'],
								'currntlctn_state'=>$inputs['crntlctn_state'],
					'crntlctn_lcalplcename'=>$inputs['crntlctn_lcalplcename'],
							'current_yrlyincm'=>$inputs['crntlctn_yrlyincm'],
							'intrst_higherstudys'=>$inputs['hghrstdy'],
										'relocate'=>$inputs['relocate'],
										'medical_cnditn'=>$inputs['medical'],
									'please_specify'=>$inputs['plesespecify'],
										'email_id'=>$inputs['emailid'],
										'phonenumber'=>$inputs['number'],
										'm_about'=>$inputs['about'],
									'trmsandcndtn'=>$inputs['trmsandcndtn'],
										
										'signup_id'=>$inputs['pasid'],
										'm_prof_photo'=>$inputs['photo'],
										'm_photo2'=>' ',
										'm_photo3'=>' ',
										'm_photo4'=>' ',
										'm_photo5'=>' ',
										'm_status'=>1,
										
							);
			//	print_r($insert);exit;
			$result =	$this->insert($insert,"mtrimny_register");	
				
//print_r($result);exit;
				//print_r($insert);exit;
				
				return $result;
				
				
			}

		function getInsert(){
		return $this->lastId;
	}
	
	/*
			 * Edit Testimonials
			*/			
			function editProfile($inputs){
					$insert	=	array('m_name'=>$this->addFilter($this->escapeHtml($inputs['name'])),
										'm_profile'=>$inputs['type'],
										'm_rltn'=>$inputs['rltn'],
										'm_relgon'=>$inputs['relgn'],
										'm_cast'=>$inputs['cast'],
										'm_subcst'=>$inputs['subcst'],
										'm_baptized'=>$inputs['baptized'],
										'm_gender'=>$inputs['gender'],
										'm_mtng'=>$inputs['mthrtng'],
						'crntly_fellwshp_cntry'=>$inputs['fllwshp_country'],
							'crntly_fellwshp_state'=>$inputs['fellwshp_state'],
					'crntly_fellwshp_chrchnme'=>$inputs['fellwshp_lclchrchnme'],
								'native_checkbox'=>$inputs['native_checkbox'],
								'nativeplace_cntry'=>$inputs['native_country'],
								'nativeplace_state'=>$inputs['native_state'],
						'nativeplace_chrchnme'=>$inputs['native_lcalchurchnme'],
										'nativeplace_fname'=>$inputs['fname'],
							'nativeplace_fthrsocption'=>$inputs['fther_occptn'],
										'nativeplace_mname'=>$inputs['mname'],
							'nativeplace_mthrsocption'=>$inputs['mthr_ocptn'],
										'm_brother'=>$inputs['brother'],
										'm_sister'=>$inputs['sister'],
										'm_fmlytyp'=>$inputs['fmlytyp'],
										'm_cntry'=>$inputs['m_country'],
										'm_state'=>$inputs['m_state'],
								'm_loclplacenme'=>$inputs['m_lcalplacename'],
											'm_dob'=>$inputs['m_dob'],
										'm_maritalstus'=>$inputs['m_mrtalstus'],
										'm_height'=>$inputs['m_hght'],
										'm_weight'=>$inputs['m_wght'],
										'm_clr'=>$inputs['m_clr'],
										'm_heighestedu'=>$inputs['m_hgstedu'],
										'm_job'=>$inputs['m_job'],
									'laststdy_cntry'=>$inputs['lststdy_cntry'],
									'laststdy_state'=>$inputs['lststdy_state'],
					'laststdy_loclplacenme'=>$inputs['lststdy_lcalplacename'],
								'currntlctn_cntry'=>$inputs['crntlctn_cntry'],
								'currntlctn_state'=>$inputs['crntlctn_state'],
					'crntlctn_lcalplcename'=>$inputs['crntlctn_lcalplcename'],
							'current_yrlyincm'=>$inputs['crntlctn_yrlyincm'],
							'intrst_higherstudys'=>$inputs['hghrstdy'],
										'relocate'=>$inputs['relocate'],
										'medical_cnditn'=>$inputs['medical'],
									'please_specify'=>$inputs['plesespecify'],
										'email_id'=>$inputs['emailid'],
										'phonenumber'=>$inputs['number'],
										'm_about'=>$inputs['about'],
									'trmsandcndtn'=>$inputs['trmsandcndtn'],
										'm_status'=>1,
										
							);
			//	print_r($insert);exit;
							
		$this->update($insert,"mtrimny_register",'`m_id`='.$inputs['id']);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
				
			}
				function editProfilecad($inputs){
					$insert	=	array(
								'm_baptized'=>$inputs['baptized'],
									
						'crntly_fellwshp_cntry'=>$inputs['fllwshp_country'],
							'crntly_fellwshp_state'=>$inputs['fellwshp_state'],
					'crntly_fellwshp_chrchnme'=>$inputs['fellwshp_lclchrchnme'],
							
										'm_fmlytyp'=>$inputs['fmlytyp'],
									
										
										'm_heighestedu'=>$inputs['m_hgstedu'],
										'm_job'=>$inputs['m_job'],
								
								'currntlctn_cntry'=>$inputs['crntlctn_cntry'],
								'currntlctn_state'=>$inputs['crntlctn_state'],
					'crntlctn_lcalplcename'=>$inputs['crntlctn_lcalplcename'],
							'current_yrlyincm'=>$inputs['crntlctn_yrlyincm'],
							'intrst_higherstudys'=>$inputs['hghrstdy'],
										'relocate'=>$inputs['relocate'],
											'email_id'=>$inputs['email'],
										'phonenumber'=>$inputs['number'],
										'm_about'=>$inputs['about']
										
							);
			//print_r($insert);exit;
							
		$this->update($insert,"mtrimny_register",'`m_id`='.$inputs['id']);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
				
			}
			function addProfiletrash($inputs){
					$insert	=	array(
										'm_status'=>$inputs['status'],
										'prof_id'=>$inputs['id']
							);
							
							
				
		$this->update($insert,"mtrimny_register",'`prof_id`='.$inputs['a_id']);		
				return true;
			

							//print_r($inputs);exit;
			
				
			}	
			
			
			function updateProfile($inputs){
					$insert	=	array(
										'm_status'=>0,
										'prof_id'=>$inputs['id']
							);
							
							
				
		$this->update($insert,"mtrimny_register",'`prof_id`='.$inputs['a_id']);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
			
				
			}			
			
	function updateGalleryImageProf($id,$image){
		 $this->update(array('m_prof_photo'=>$image),'mtrimny_register','`m_id`='.$id);
	}
		function updateGalleryImage2($id,$image){
		 $this->update(array('m_photo2'=>$image),'mtrimny_register','`m_id`='.$id);
	}
		function updateGalleryImage3($id,$image){
		 $this->update(array('m_photo3'=>$image),'mtrimny_register','`m_id`='.$id);
	}
		function updateGalleryImage4($id,$image){
		 $this->update(array('m_photo4'=>$image),'mtrimny_register','`m_id`='.$id);
	}
		function updateGalleryImage5($id,$image){
		 $this->update(array('m_photo5'=>$image),'mtrimny_register','`m_id`='.$id);
	}
	
	 function getProfile($id){
		$query	=	"SELECT * FROM `mtrimny_register` WHERE `m_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		//print_r($query);exit;
		return $rec;
	}

	 function getProfilecand($pasid){
	    // print_r($id);
	      //  print_r($ph);
	  /* if($id!=' '){
	       
	       $conditions.="email_id='$id'";
	   }
	   else
	    {
	    $conditions.='';
	    }   
	     if($ph!=' ')
	    {
	    $conditions.="phonenumber='$ph'";
	    } */
$query	=	"SELECT * FROM `mtrimny_register` WHERE signup_id=$pasid ";
//$query.=$conditions;
//print_r($query);exit;
		$rec		=	$this->fetchAll($query);
		//print_r($query);exit;
		return $rec;
	}
	
	function getAllProfileDetails()
	{
		$query = "SELECT * FROM  mtrimny_register where  m_status=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}
	function getAllProfilesearch($inputs)
	{
	    $gender=$inputs['gender'];
	    $cast=$inputs['srel'];
	    $agefrom=$inputs['agefrom'];
	    if($agefrom=='null')
	    {
	        $agefrom=18;
	    }
	
	    
	    $ageto=$inputs['ageto'];
	        if($ageto=='null')
	    {
	        $ageto=70;
	    }
	    $mtonq=$inputs['mtonq'];
	    $m_wght=$inputs['m_wght'];
	    $m_hght=$inputs['m_hght'];
	    $mcntry=$inputs['mcntry'];
	    $mstate=$inputs['mstate'];
	    $color=$inputs['color'];
	    $job=$inputs['job'];
	    $m_hgstedu=$inputs['m_hgstedu'];
	    $fmlytyp=$inputs['fmlytyp'];
	    $date=date('Y');
	    $datefrom=$date-$agefrom;
	    $datefrom = "$datefrom-12-31";
	    $dateto = $date-$ageto;
	    $dateto = "$dateto-12-31";
	    $conditions='';
	    if($cast!='Select')
	    {
	     $conditions.="and m_cast='$cast'";
	    }
	     if($mcntry!='-1')
	    {
	    $conditions.="and m_cntry='$mcntry'";
	    }
	     if($mstate!='')
	    {
	    $conditions.="and m_state='$mstate'";
	    }
	    if($agefrom!='' && $ageto !='')
	    {
	        
        $conditions.="and m_dob BETWEEN str_to_date('$dateto', '%Y-%m-%d') AND '$datefrom'";

	    }
	    else if($agefrom!='' && $ageto =='')
	    {
	      $conditions.="and m_dob >= '$datefrom'";  
	    }
	     else if($agefrom=='' && $ageto !='')
	    {
	      $conditions.="and m_dob <= '$dateto'";  
	    }
	    if($mtonq!='Select')
	    {
	    $conditions.="and m_mtng='$mtonq'";
	    }
	     if($m_hght!='Select')
	    {
	    $conditions.="and m_height BETWEEN $m_hght ";
	    //print_r($conditions);exit;
	    }
        if($m_wght!='Select')
	    {
	    $conditions.="and m_weight='$m_wght'";
	    }
	    if($color!='Select')
	    {
	    $conditions.="and m_clr='$color'";
	    //print_r($conditions);exit;
	    }
	    if($m_hgstedu!='Select')
	    {
	    $conditions.="and m_heighestedu='$m_hgstedu'";
	    //print_r($conditions);exit;
	    }
	    if($fmlytyp!='Select')
	    {
	    $conditions.="and m_fmlytyp='$fmlytyp'";
	   // print_r($conditions);exit;
	    }
	    if($job!='--Select--' )
	    {
	    $conditions.="and m_job='$job'";
	    }
	    $conditions.="and m_status=1";
		$query = "SELECT * FROM  mtrimny_register where m_gender!='$gender' ";
		$query.=$conditions;
//print_r($query);//exit;
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}
	function getAllProfilesearchbyname($name,$gender,$mid)
	{
		$query = "SELECT * FROM  mtrimny_register where  m_status=1 and m_gender!='$gender' and m_id !=$mid and m_name like '$name%' ";
		//print_r($query);exit;
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}
function getAllProfileDetailsTrash()
	{
		$query = "SELECT * FROM  mtrimny_register where  m_status=3";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}
	function getAllProfileMax()
	{
		$query = "SELECT max(m_id) as max_id FROM `mtrimny_register`";
		$rec = $this->fetchAll($query);
		return $rec;	
		//print_r($query);exit;
	}	
	

}
?>