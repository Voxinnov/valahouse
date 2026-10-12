<?php	 	

	class Payment extends MySql{
	
	
	
	function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('testimonials','`t_id`='.$list[$i]);
					}
			}	
			
			
	
	function listPayment(){
		
		
		$query = "SELECT * FROM `payment_details` c WHERE c.`paymnt_id`!='' ORDER BY `paymnt_id` DESC";
		
		$rec	=	$this->fetchAll($query);
	
		
		return $rec;		
		
		
	}
	
	 /* Add Testimonials
			*/			
			function addPayment($inputs){
					$insert	=	array('paymnt_email'=>$this->addFilter($this->escapeHtml($inputs['email'])),
						//'ad_cat'=>$inputs['ad_cat'],
									  'paymnt_phn'=>$inputs['phone'],
									  'paymnt_amount'=>$inputs['amount'],
									  'paymnt_date'=>$inputs['pdate'],
									  'paymnt_u_id'=>$inputs['profid'],
									  'paymnt_exp_date'=>$inputs['expdate'],
									  'paymnt_razorpay'=>$inputs['razorpay_payment_id'],
									  'paymnt_status'=>$inputs['status'],
										);
			//	print_r($insert);exit;
				$this->insert($insert,"payment_details");	
				

				
				return true;
				
				
			}


		function getInsert(){
		return $this->lastId;
	}
	/*
			 * Edit Testimonials
			*/			
			function editPayment($inputs){
					$insert	=	array('ad_title'=>$this->addFilter($this->escapeHtml($inputs['title'])),
										'ad_description'=>$inputs['caption'],
										
										//'ad_cat'=>$inputs['ad_cat'],
										'ad_image'=>$inputs['photo'],
										'ad_lctn'=>$inputs['lctn'],
									  'ad_icn_img'=>$inputs['iconimg'],
										'ad_status'=>$inputs['status'],
										'paymnt_id'=>$inputs['id']
							);
							
							
				
		$this->update($insert,"payment_details",'`paymnt_id`='.$inputs['id']);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
								
			
			
				
			}

	function updateGalleryImage2($id,$image1){
		 $this->update(array('ad_icn_img'=>$image),'payment_details','`paymnt_id`='.$id);
	}


	 function getPayment($id){
		$query	=	"SELECT * FROM `payment_details` WHERE `paymnt_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	 function getPaymentprofile($id){
		$query	=	"SELECT * FROM `payment_details` WHERE `paymnt_u_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	function getAllPaymentDetails()
	{
		$query = "SELECT * FROM  payment_details where  ad_status=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}

}
?>