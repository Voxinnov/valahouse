<?php include('menu.php'); 
$Obj  = new About();
                    $abtContent= $Obj->getAbout();		
	//print_r($cnt_cont)	;exit;
	$abtga=new Aboutgallery();
	$get_abtga = $abtga->getAllAboutgalleryDetails();
//print_r($get_abtga)	;exit;
	$total_abtga = count($get_abtga);
    $back    =   new Background();                 

$get    =   $back->getGallery(1);
 ?>
 
	  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css'>
 <style>
      html::before {

  content: ' ';

  display: block;

  background-image: url("valahouse_admn/upload/Gallery/<?php echo $get[0]["back_img_img"];?>");

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
	<!--Page headet title-->
<!--	<div class="header_title pade_bg5 d-flex justify_content_center align_items_center bg_overlay1" style="background-image: url(valahouse_admn/upload/Gallery/<?php echo $get[0]["back_img_img"];?>);">
		<div class="container">
			<h1 class="page_title"></h1>
			<ul class="page-list">
				<li><a href="#"></a></li>
				<li></li>
				<li></li>
			</ul>
		</div>
	</div>--><!--END Page headet title-->
	
	
	<!--type page wrapper-->
	<div class="type_page_wrapper section_padding_60_60" style="margin-top:100px">

		<!--Start container-->
		<div class="container" style="background-color:#eeeeeee0; padding:20px">

			<div class="about_section">
			
			
				
				<div class="row">
					
					<div class="content-column col-xl-8 col-lg-8 col-md-8 col-sm-8">
						<div class="sec-title text-center">
				<h2 class="section_heading_title" >
           Book Now
					</h2>
						</div>
	<div id="apartmentIframe1360988">
<script type="text/javascript" src="https://login.smoobu.com/js/Settings/BookingToolIframe.js"></script>
<script>BookingToolIframe.initialize({"url": "https://login.smoobu.com/en/booking-tool/iframe/458522/1360988", "baseUrl": "https://login.smoobu.com", "target": "#apartmentIframe1360988"})</script>
</div>
				
				
				</div>
					<div class="content-column col-xl-4 col-lg-4 col-md-4 col-sm-4">
					 <!-- <div id="smoobuApartment1360988de" class="calendarWidget"> <div class="calendarContent" data-load-calendar-url="https://login.smoobu.com/de/cockpit/widget/single-calendar/1360988" data-verification="567827de934d439ec8b72c9cc3ae0e6715e8a5202338217d19bda4b4caa0b2ce" data-baseUrl="https://login.smoobu.com" data-disable-css="false" ></div> <script type="text/javascript" src="https://login.smoobu.com/js/Apartment/CalendarWidget.js"></script></div>
				-->
						<div class="sidebar_block light_area">

					
						<h4>RESERVATIONS & INFO</h4>
							<p align="justify"><br>
							    <?php echo $cnt_cont[0]["cnt_adrs"];?><br><br>
						
Villa Host<br>

<a href="tel:<?php echo $cnt_cont[0]["cnt_no"];?>"><?php echo $cnt_cont[0]["cnt_no"];?></a><br><br>
Reservation<br>
<a href="tel:<?php echo $cnt_cont[0]["cnt_bno"];?>"><?php echo $cnt_cont[0]["cnt_bno"];?></a><br>
<a href="mailto:<?php echo $cnt_cont[0]["cnt_email"];?>" ><?php echo $cnt_cont[0]["cnt_email"];?></a>

						
					</div>
					</div>
			</div>
			
		
			
		</div><!--END Start container-->

	</div><!--END type page wrapper-->
	
	
	  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'></script>


<?php include('footer.php'); ?>