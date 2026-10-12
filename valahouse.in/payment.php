<?php
 ob_start();
session_start();
require('Razorpay/Razorpay.php');
//include("session.php");
//include("autoload.php");
require_once("confi.php");

include("dbpay.php");
$room = $_GET['room'];

$b_id=$_GET['b_id'];

$query	=	"SELECT * FROM `rooms` WHERE rooms_id=$room";
	$result			=	mysqli_query($conn,$query);
	while($row = $result->fetch_assoc())
		{
			$r_name=$row["rooms_titl"];
			
			$amount=$row["rm_rate_day"];
			
			$min_no =$row["rm_min_no"];
			$xtra =$row["rm_extra_rate"];
			
		}
		
		$query2	=	"SELECT * FROM `bkng_pymnt` WHERE form_id=$b_id";
	$result2			=	mysqli_query($conn,$query2);
	while($rows = $result2->fetch_assoc())
		{
			$name=$rows["form_name"];
			
			$email=$rows["form_email"];
			
			$ad =$rows["rm_chkin"];
			$dd =$rows["rm_chkout"];
			$adu= $rows["rm_adlt"];
			$chl =$rows["rm_chld"];
			
		}
		$total_adls =$adu+$chl;
		if($total_adls>$min_no)
		{
		    $sub=$total_adls-$min_no;
		}
		$date1=date_create($ad);
$date2=date_create($dd);
$diff=date_diff($date1,$date2);
$day=$diff->format("%a");
		$tamount =($amount+($xtra*$sub))*$day;
        $intnsn=($tamount/100) * 2;
        $total_amount=$tamount+$intnsn;
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
							    <h2>Payments</h2>
							    <p>Payments can be made either by bank transfer or by credit/debit card. The prices quoted will be in our local currency, Indian Rupees. We are happy to receive payment in any internationally acceptable currency and the holiday price will be converted using the exchange rate stipulated by the Reserve Bank of India on the date the payment is made. Please note, we do not use the exchange rate advertised by several private websites as they are only indicative, not what is actually used for transaction.
</p>
<p>Should you wish to transfer money directly to our account then please make sure that any bank charges are borne by the client. We will credit the exact amount that we receive in our account. Any shortfall/ excess will be adjusted against the client account and will be collected/refunded as the case might  be.
There will be an additional surcharge for payment by credit cards, usually upto 2.5%
</p>
<p>Booking terms and Cancellation policy:</p>
<p>25% advance is required to process booking and the balance is to be paid at-least 45 days (60 days prior if traveling during peak period) prior to the date of travel. In some cases when travel is over peak period a higher deposit may be required. Full advance is required in certain cases such as special train journeys, hotels during peak period ( Christmas/New Year Period or special festival time) We will inform you if this is required. Please note this is an advance payment only and not a refundable deposit. Refunds will be processed based on our cancellation policy mentioned below.
</p>
<p>Date of receipt of cancellation notification  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cancellation charges
</p>
<p>If cancellation is received more than 60 days prior there will be no retention other than admin charges of Rs 1000 per person. Some hotels require full amount in advance for confirmation of the booking. In such cases, if you cancel after the payment has been made then the Individual hotel cancellation policy will apply. In most cases this is a night’s retention.
</p>
<p>60 days to 45 days  prior to start of the holiday  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;25% of the Tour cost<br>
45  days to 30 days prior to start of the holiday    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;50% of the Tour cost<br>
30  days to 20 days prior to start of the holiday  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 75% of the Tour cost<br>
20 days prior to start of the holiday  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 100% of the Tour cost
</p>
<p>This is a rough calculation, in the unlikely event of you having to cancel the trip we will try our best to refund whatever possible from the hotels and are happy to refund the same after deducting admin charges. If you decide to postpone your trip after confirmation and it falls within the cancellation period then we will try and credit the amount paid against your future trip as long as you follow the same itinerary and use the same hotels, subject to the availability at the same hotels for the new dates and should it not be available, the hotel’s Individual cancellation policy will apply.
In most cases the domestic flight tickets issued are on special fares and incur full cancellation. </p>
							    
								<H2>PAY NOW</H2>
								
								<form class="contact-form" method="post" >
						<div class="row columns_padding_5">

							<div class="col-xs-12 col-md-12 ">
								<div class="filed_form">
								<label>Name</label>	<input type="text" value="<?php echo $name;?>" name="name" class="form-control">
									<label>Email id</label>		<input type="text" name ="email" value="<?php echo $email;?>" Readonly/>
									<label>Room Name</label>		<input type="text" name ="occup" value="<?php echo $r_name;?>"  Readonly />
									<label>Check In Date</label>		<input type="text" name ="ad" value="<?php echo $ad;?>" Readonly />
									<label>Room Amount: </label>		<input type="text" name ="amount" value="<?php echo $total_amount-$intnsn;?>" Readonly />
										<label>Interest Amount: </label>		<input type="text" name ="amount" value="<?php echo $intnsn;?>" Readonly />
											<label>Total Payable Amount: </label>		<input type="text" name ="amount" value="<?php echo $total_amount;?>" Readonly />
								</div>
							</div>
							
							<div class="col-xs-12 col-md-12 "><a href="rooms.php" class="sv_btn sv_btn_default easescroll">Pay Later</a></div>

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

                                <input type="hidden" name="ofrs" value="<?php echo $r_name; ?>" readonly > 
                                
             <input type="hidden" name="rates" value ="<?php echo $total_amount; ?>">
             
              <input type="hidden" name="intnsns" value ="<?php echo $intnsn; ?>">
              <input type="hidden" id="names" name="names" value ="<?php echo $name ; ?>">
              <input type="hidden" id="emails" name="emails" value ="<?php echo $email; ?>">
              <input type="hidden"  name="b_id" value ="<?php echo $b_id; ?>">
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

	<!-- main_footer -->
	<footer class="main_footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-3 footer_block">
					<img src="assets/images/valahouse.png" alt="" style="width:100px">
			<p><a href="termsandcondition.php" style="color: #fff">Terms and Conditions</a> <br>
				<a href="privacypolicy.php" style="color: #fff">Privacy Policy</a> <br>
				<a href="refundandcancellation.php" style="color: #fff">Refund & Cancellation </a></p>	
				</div>
				<div class="col-md-6 col-lg-3 footer_block">
					<div class="social_wg">
						<h6 class="footer_block_title">Socials Media</h6>
						<p><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter-square"></i></a>
						<a href="https://www.facebook.com/profile.php?id=100073739640797" target="_blank"><i class="fab fa-facebook-square"></i></a>
						<a href="https://www.youtube.com/watch?v=V-AgmZk8kc4&t=15s" target="_blank"><i class="fab fa-youtube"></i></a>
						<a href="https://www.instagram.com/valahousecherai/" target="_blank"><i class="fab fa-instagram"></i></a></p>
						<p><a href="https://www.youtube.com/watch?v=V-AgmZk8kc4&t=15s" target="_blank"><i class="fab fa-vimeo"></i></a>
						<a href="https://flic.kr/s/aHsmWycQX7" target="_blank"><i class="fab fa-flickr"></i></a>
						<a href="https://madilinahouse.blogspot.com/" target="_blank"><i class="fab fa-blogger"></i></a>
						<a href="https://www.tripadvisor.in/Hotel_Review-g2266916-d6678441-Reviews-Madilina_House-Chendamangalam_Ernakulam_District_Kerala.html" target="_blank"><i class="fab fa-tripadvisor"></i></a></p>

					</div>
											<br><p>Reservation<br>
<a href="mailto:contact@valahouse.in" style="color: #fff;">contact@valahouse.in</a><br>
<a href="tel:+917306496942" style="color: #fff;">+91 7306496942</a>
</p>
				</div>
				
				<div class="col-md-6 col-lg-3 footer_block">
						<h6 class="footer_block_title">Contact us</h6>
						<p>1/278 Pipeline Road<br>
                        Cherai Beach-Munambam Road<br>
                        Kerala 683515</p><br>
<p>Villa Host<br>
<a href="tel:+919447396960" style="color: #fff;">+91 9447396960</a>
</p>
				</div>
				<div class="col-md-6 col-lg-3 footer_block">
						<h6 class="footer_block_title">Location</h6>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3927.2026509288157!2d76.17019811421046!3d10.164176672976081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b0819f35e70f2dd%3A0xb807d41c78e3dc6c!2sVala%20House!5e0!3m2!1sen!2sin!4v1650981525390!5m2!1sen!2sin" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				</div>
			</div>
		</div>
	</footer><!-- END main_footer -->
	
	<!-- JS -->
	<!--jQuery 1.12.4 google link-->
	<script src="ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!--Bootstrap 4.1.0-->
	<script src="assets/libs/bootstrap-4.1.0/bootstrap.min.js"></script>
	<!--shuffle-->
	<script src="assets/libs/shuffle/shuffle.min.js"></script>
	<!--jquery.magnific-popup-->
	<script src="assets/libs/jquery.magnific-popup/jquery.magnific-popup.min.js"></script>
	<!--OwlCarousel2-2.3.4-->
	<script src="assets/libs/owlcarousel2-2.3.4/owl.carousel.min.js"></script>
	<!--Custom js-->
	<script src="assets/js/custom.js"></script>

</body>

</html>