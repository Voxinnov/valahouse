<?php
 ob_start();
//session_start();
include("autoload.php");
//include("session.php");
//$pasid	=	$_SESSION["LogUserID"];
//$ad_name	=	$_SESSION["Loguser_name"];
$db		=	new MySql();
$db->connect();
 $date = date('Y-m-d');
$payment =$_POST;
//$objA	=	new Admin();
//$data	=	$objA->getAdmin($pasid);
if($payment['razorpay_payment_id']==''){
    	header('Location:https://valahouse.in/rooms.php');
					exit;
}
	   $name	    =	$_POST['names']; 
		$email	= 	$_POST['emails'];
		 $ofr	= 	$_POST['ofrs'];
		 $rate	= 	$_POST['rates'];
		$intnsn	= 	$_POST['intnsns'];
		$b_id=$_POST['b_id'];
		$ad=$_POST['ad'];
		// $date		= 	$_POST['date'];

	//print_r($rate);

	if(empty($intnsn))
	{
	    $intnsn=' ';
	}

	    $cat	=	new Payment();
			     $inputs	=	array('name'=>$name,
				                      'email'=>$email,
				                      'number'=>$number,
				                      'comment' =>$comment,
				                      'ofr' =>$ofr,
				                      'rate' =>$rate,
									  'date' =>$date,
									  'ad'=>$ad,
				                      'intnsn' =>$intnsn,
									  'razorpay_payment_id'=>$payment['razorpay_payment_id'],
									  'id'=>$b_id
									  );
									  
		//	print_r($inputs);exit;
		if($b_id!=0)
		{
				if($cat->editOfferform($inputs)){
				
					
					$message	=	new Message('New Gallery added ','message');
					$message->setMessage();
					header('Location:https://valahouse.in/rooms.php');
					exit;
					
				}else{
					
					$message	=	new Message('Unknown error','error');
					$message->setMessage();
				}
		}
		else
		{
		    		if($cat->addmanualOfferform($inputs)){
				
					
					$message	=	new Message('New Gallery added ','message');
					$message->setMessage();
					header('Location:https://valahouse.in/rooms.php');
					exit;
					
				}else{
					
					$message	=	new Message('Unknown error','error');
					$message->setMessage();
				}
		}
		
	  

?>