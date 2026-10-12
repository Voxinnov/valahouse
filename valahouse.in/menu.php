<?php
include("autoload.php");
$db     =   new MySql();
$db->connect();
$cnt = new Location();
        $cnt_cont = $cnt-> getLocation();
		
		
	//print_r($cnt_cont)	;exit;
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
					<li><a href="rooms.php">Booking</a></li>
					<li >
						<a href="experiences.php">Experiences</a>
						
					</li>
					<!--	<li><a href="spa.php">SPA</a></li>
					<li><a href="media.php">Media</a></li>-->
					<li><a href="gallery.php">Gallery</a></li>
				
					<li><a href="contact.php">Contact</a></li>
				<li><a href="payment_method.php">PAYNOW</a></li>
			
					
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
			<nav class="top_nav_links navbar navbar-expand-lg">
				<div class="collapse navbar-collapse" id="topNav">
					<ul class="navbar-nav mr-auto">
						<li><a href="index.php">Home</a></li>
					<li><a href="ourstory.php">Our Story</a></li>
					<li class="has-child"><a href="rooms.php">Booking</a>
					<ul class="sub-menu">
					    <li><a href="all_accommodations.php">All Accommodations</a></li>
				                               <?php
          $act = new Rooms();
$act_img = new Roomsimg();
            $act_cntnt = $act-> getAllRoomsDetails();
            $act_cntnt_cont = count($act_cntnt);


            for ($i=0; $i <$act_cntnt_cont ; $i++) { 
                # code...
            
   ?> 
     
							<li><a href="room_details.php?g_id=<?php echo $act_cntnt[$i]["rooms_id"];?>">	<?php echo $act_cntnt[$i]['rooms_titl'];?></a></li>
							 <?php } ?> 
						</ul>
					</li>
					<li >
						<a href="experiences.php">Experiences</a>
						
					</li>
					<!--<li><a href="spa.php">SPA</a></li>
				
					<li><a href="media.php">Media</a></li>-->
					<li><a href="gallery.php">Gallery</a></li>
					<li><a href="contact.php">Contact</a></li>
			<li><a href="payment_method.php">PAYNOW</a></li>
						
					</ul>
				</div>
			</nav>
		</div>
	</header><!--END main header -->