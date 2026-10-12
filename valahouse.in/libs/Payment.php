<?php
	class Payment extends MySql{
	
	
	function listOfferform(){
		
		
		$query = "SELECT * FROM `bkng_pymnt` c WHERE c.`form_id`!=''  ORDER BY `form_id` DESC";
		
		$rec	=	$this->fetchAll($query);
	
		//print_r($query);exit;
		return $rec;		
		
		
	}

		
			function addmanualOfferform($inputs){
					$insert	=	array('form_name'=>$this->addFilter($this->escapeHtml($inputs['name'])),
										'form_email'=>$inputs['email'],
										'form_offer'=>$inputs['ofr'],
										'form_intnsn'=>$inputs['intnsn'],
										'form_amount'=>$inputs['rate'],
											'rm_chkin'=>$inputs['ad'],
										'form_date'=>$inputs['date'],
										'razorpay_value'=>$inputs['razorpay_payment_id']
							);
			//	print_r($insert);exit;
				$this->insert($insert,"bkng_pymnt");	
				

				//print_r($insert);exit;
				return true;
				
				
			}
			
			function addOfferform($inputs){
					$insert	=	array('form_name'=>$this->addFilter($this->escapeHtml($inputs['name'])),
										'form_email'=>$inputs['email'],
										'form_number'=>$inputs['number'],
										'form_cmnt'=>$inputs['comment'],
										'rm_chkin'=>$inputs['ad'],
										'rm_chkout'=>$inputs['dd'],
										'rm_adlt'=>$inputs['aud'],
										'rm_chld'=>$inputs['child']
							);
			//	print_r($insert);exit;
				$this->insert($insert,"bkng_pymnt");	
				

				//print_r($insert);exit;
				return true;
				
				
			}
				function addpayment($inputs){
					$insert	=	array('pay_list_name'=>$this->addFilter($this->escapeHtml($inputs['name'])),
										'pay_list_remark'=>$inputs['comment'],
										'pay_list_date'=>$inputs['date'],
							);
			//	print_r($insert);exit;
				$this->insert($insert,"pay_list");	
				

				//print_r($insert);exit;
				return true;
				
				
			}

		function getInsert(){
		    $query = "SELECT max(form_id) as lastId FROM  bkng_pymnt";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;
	}
	
	/*
			 * Edit Testimonials
			*/			
		function editOfferform($inputs){
					$insert	=	array('form_name'=>$this->addFilter($this->escapeHtml($inputs['name'])),
										'form_email'=>$inputs['email'],
										'form_offer'=>$inputs['ofr'],
										'form_intnsn'=>$inputs['intnsn'],
										'form_amount'=>$inputs['rate'],
										'form_date'=>$inputs['date'],
										'razorpay_value'=>$inputs['razorpay_payment_id']
							);
							
		$this->update($insert,"bkng_pymnt",'`form_id`='.$inputs['id']);		
				return true;
			

			
				
							//print_r($inputs);exit;
							
				
			}
			
	
			
				
			


	 function getOfferform($id){
		$query	=	"SELECT * FROM `bkng_pymnt` WHERE `form_id`='$id'  ";
		$rec		=	$this->fetchAll($query);
		//print_r($query);exit;
		return $rec;
	}
	function getAllOfferformDetails()
	{
		$query = "SELECT * FROM  bkng_pymnt where  cntct_form_status=1";
		$rec = $this->fetchAll($query);
		//print_r($rec);exit;
		return $rec;	
	}
	
	
		 function getOfferformAlldate($date){
			 $from =	$date['from'];
		$to =	$date['to'];
		
$query	=	"SELECT * FROM `bkng_pymnt` WHERE form_date BETWEEN str_to_date('$from', '%Y-%m-%d') AND '$to' ";

		//print_r($query);exit;
		$rec		=	$this->fetchAll($query);
		return $rec;
	}
	
	 function Offerformexport($productResult) {
        $timestamp = time();
        $filename = 'Export_excel_' . $timestamp . '.xls';
        
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        
        $isPrintHeader = false;
        foreach ($productResult as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
        exit();
    }
	

}
?>