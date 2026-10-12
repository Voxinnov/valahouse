<?php
include("autoload.php");
$db     =   new MySql();
$db->connect();
$cat	=	new Payment();
 if(isset($_POST['submit']))
 {
     $name =strip_tags($_POST['name']);
     $date =strip_tags($_POST['ad']);
     $remark =strip_tags($_POST['remark']);
     
      $inputs	=	array('name'=>$name,
                            'comment' =>$remark,
							'date' =>$date,
							 );
							 
		    		if($cat->addpayment($inputs)){
				
					
					$message	=	new Message('New Gallery added ','message');
					$message->setMessage();
				 echo '<script>window.location.href="https://buy.stripe.com/4gw4hNg6Q2To2GsfYY";</script>';
				//	header('https://buy.stripe.com/4gw4hNg6Q2To2GsfYY');
					exit;
					
				}else{
					
					$message	=	new Message('Unknown error','error');
					$message->setMessage();
				}
 }
 ?>