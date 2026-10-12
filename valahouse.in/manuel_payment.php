<?php
 ob_start();
session_start();
require('Razorpay/Razorpay.php');
//include("session.php");
//include("autoload.php");
require_once("confi.php");

include("dbpay.php");
$name=$_POST['name'];
$email=$_POST['email'];
$occup=$_POST['occup'];
$ad=$_POST['ad'];
$amount=$_POST['amount'];


        $intnsn=($amount/100) * 2;
        $total_amount=$amount+$intnsn;
        $r_total = $total_amount*100;
/*print_r($amount);       
echo "<br>";
print_r($intnsn); 
echo "<br>";
print_r($total_amount);exit;*/
?><!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Vala House</title>
	<link rel="icon" type="image/png" href="assets/images/favicon.png">
	<!--Main style css-->
	<link rel="stylesheet" href="assets/css/style.css"> 
	<!--Responsive style css-->
	<link rel="stylesheet" href="assets/css/responsive.css"> 
	   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
	<style>
	h1, h2, h3, h4, h5, h6, p, li, div{
font-family: 'Poppins', sans-serif !important;
   
}
	@media (max-width:767px)
	{
	.contact_p_e{
	display:none;
	}
	}
  body{
            background-color: #eee;
       } 
	</style>
</head>
<body >
	<!-- main navigation mobile -->
	<div class="main_nav_mobile" id="topNavMobile">
		<div class="main_nav_mobile_inner">
			<div class="navbar_nav_over_wrapp">
				<ul class="navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="ourstory.php">Our Story</a></li>
					<li><a href="rooms.php">Rooms</a></li>
					<li >
						<a href="experiences.php">Experiences</a>
						
					</li>
					<!--	<li><a href="spa.php">SPA</a></li>
					<li><a href="media.php">Media</a></li>-->
					<li><a href="gallery.php">Gallery</a></li>
				
					<li><a href="contact.php">Contact</a></li>
			
			
					
				</ul>
			</div>
			<button class="close_mobile_menu" type="button" data-target="#topNavMobile">
				<span class="navbar-toggler-icon"><i class="fas fa-times"></i></span>
			</button>
		</div>
		<div class="cover_mobile_menu" data-target="#topNavMobile"></div>
	</div>
	<!-- END main navigation mobile -->

	<!-- main header -->
	<header class="main_header fixed_header transparen_bg_head">
		<div class="container clearfix">
			<div class="logo_head">
				<a href="index.php"><img src="assets/images/valahouse.png" alt="" style="width:130px"></a>
			</div>
			<div class="navbar-expand-lg nav_btn_toggle">
				<button class="navbar-toggler open_mobile_menu" type="button" data-target="#topNavMobile">
					<span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
				</button>
			</div>
			<?php  use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);     
     $orderData = [
    'receipt'         => 3456,
    'amount'          => $r_total, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;
      ?>
			<nav class="top_nav_links navbar navbar-expand-lg">
				<div class="collapse navbar-collapse" id="topNav">
					<ul class="navbar-nav mr-auto">
						<li><a href="index.php">Home</a></li>
					<li><a href="ourstory.php">Our Story</a></li>
					<li class="has-child"><a href="rooms.php">Rooms</a>
			
					</li>
					<li >
						<a href="experiences.php">Experiences</a>
						
					</li>
					<!--<li><a href="spa.php">SPA</a></li>
				
					<li><a href="media.php">Media</a></li>-->
					<li><a href="gallery.php">Gallery</a></li>
					<li><a href="contact.php">Contact</a></li>
			
						
					</ul>
				</div>
			</nav>
		</div>
	</header><!--END main header -->
<?php

?>
	
 <style>
      html::before {

  content: ' ';

  display: block;

  background-image: url("assets/images/0018.jpg");

  background-position: center;

  background-size: cover;

  height: 100vh;

  width: 100vw;

  top: 0;

  bottom: 0;

  left: 0;

  right: 0;

  position: fixed;

  z-index: -10;

}
 </style>
		<!--type page wrapper-->
	<!--type page wrapper-->
	<div class="type_page_wrapper section_padding_60_60" style="margin-top:100px">

		<!--Start container-->
		<div class="container" style="background-color:#eeeeeee0; padding:20px">
		
			<div class="row">
			
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="sidebar_right">
					
						<div class="sidebar_block light_area">
							<div class="widget_recent_post">
					
							    
								<H2>PAY NOW</H2>
								
								<form class="contact-form" method="post" >
						<div class="row columns_padding_5">

							<div class="col-xs-12 col-md-12 ">
								<div class="filed_form">
								<label>Name</label>	<input type="text" value="<?php echo $name;?>" name="name" class="form-control">
									<label>Email id</label>		<input type="text" name ="email" value="<?php echo $email;?>" Readonly/>
									<label>Room Name</label>		<input type="text" name ="occup" value="<?php echo $occup;?>"  Readonly />
									<label>Check In Date</label>		<input type="text" name ="ad" value="<?php echo $ad;?>" Readonly />
									<label>Room Amount: </label>		<input type="text" name ="amount" value="<?php echo $amount;?>" Readonly />
										<label>Interest Amount: </label>		<input type="text" name ="amount" value="<?php echo $intnsn;?>" Readonly />
											<label>Total Payable Amount: </label>		<input type="text" name ="amount" value="<?php echo $total_amount;?>" Readonly />
								</div>
							</div>
						
						</div>
					
					</form>
				
				  <form action="action_payment.php" method="POST"> 
                                <?php 
?>
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $keyId; ?>" // Enter the Key ID generated from the Dashboard
    data-amount="<?php echo $r_total; ?>" // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    data-currency="INR"
      data-order_id="<?php echo $razorpayOrderId ?>"
    data-buttontext="Pay with Razorpay"
    data-name="Valahouse"
    data-description="Vala House "
    data-image="./images/logo@2x.png"
    data-prefill.name="Valahouse"
    data-prefill.email=""
    data-prefill.contact=""
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">

                                <input type="hidden" name="ofrs" value="<?php echo $occup; ?>" readonly > 
                                
             <input type="hidden" name="rates" value ="<?php echo $total_amount; ?>">
             
              <input type="hidden" name="intnsns" value ="<?php echo $intnsn; ?>">
              <input type="hidden" id="names" name="names" value ="<?php echo $name ; ?>">
              <input type="hidden" id="emails" name="emails" value ="<?php echo $email; ?>">
              <input type="hidden" name ="ad" value="<?php echo $ad;?>"  />
                            <input type="hidden"  name="b_id" value ="0">
</form>
								
							</div>
						</div>
					
						
					</div>
					
						
				
				</div>
				
		</div>
			
		</div><!--END Start container-->
		
	</div><!--END type page wrapper-->
	<section id="services" class="section_padding_30_30">
    <div class="container">
			</section>
	<!--Services Slider-->
<?php include('footer.php'); ?>