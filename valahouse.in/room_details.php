<?php include('menu.php'); 
$n_id=  $_GET["g_id"];
//print_r($n_id); exit;
 $act = new Rooms();
 $get    =   $act->getRooms($n_id);
$act_img = new Roomsimg();
$get_img = $act_img->getAcimg_act($n_id);
$get_total= count($get_img);
$get_imgs = $act_img->getAcimg_actfac($n_id);
//print_r($get_imgs);exit;
$gets_total = count($get_imgs);
  $back    =   new Background();                 

$get1    =   $back->getGallery(10);?>

	  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css'>
 <style>
      html::before {

  content: ' ';

  display: block;

  background-image: url("valahouse_admn/upload/rooms/<?php echo $get[0]["rooms_banner"];?>");

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
<!--END Page headet title-->
	
		<!--type page wrapper-->
	<div class="type_page_wrapper section_padding_60_60" style="margin-top:100px">

		<!--Start container-->
		<div class="container" style="background-color:#eeeeeee0; padding:20px">


		
			<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12 item_content">	<h2 class="entry-title text-center"><?php echo $get[0]["rooms_titl"];?></h2>
			
					<!--	<h4 class=" text-center">Tariff : <?php echo $get[0]["rooms_rate"];?></h4>-->
						</div>
				<div class="col-xs-12 col-md-8 col-lg-8">
				
					<div class="gallery_item owl-carousel float_nav">
					    <?php 
                                                        for ($i=0; $i < $get_total ; $i++) { 
                                                    
                                                    ?>
						<div class="item">
							<a href="valahouse_admn/upload/rooms/<?php echo $get_img[$i]['room_img_photo'];?>" class="see_big_pic hover_link_effect">
								<i class="fas fa-search"></i>
								<img src="valahouse_admn/upload/rooms/<?php echo $get_img[$i]['room_img_photo'];?>" alt="" style="height:auto">
							</a>
						</div>
						      <?php } ?>
				
					
					</div>
				
					<div class="item_content">

					
							<p align="justify">
							 <?php echo $get[0]["rooms_dscr"];?></p>
							<p  align="justify" >
						<?php echo $get[0]["rooms_inclusion"];?></p>
							<br>
						
		
					<!--	<div align="center"><a href="booknow.php?room=<?php echo $get[0]["rooms_titl"]; ?>"  class="sv_btn sv_btn_default">Book Now</a></div>-->
					</div>
					
				</div>
			<div class="col-xs-12 col-md-4 col-lg-4">
			    <?php if($n_id==10){ ?>
			    <a href="fullvilla.php"class="sv_btn sv_btn_default" target="_blank" style="color:#fff">Book Now</a><br><br>
			   <!--  <div id="smoobuApartment1360874de" class="calendarWidget"> <div class="calendarContent" data-load-calendar-url="https://login.smoobu.com/de/cockpit/widget/single-calendar/1360874" data-verification="5960d99ef30f8ef1007154d305be4d358652bbee27d57e8a7e62a8389d3090d9" data-baseUrl="https://login.smoobu.com" data-disable-css="false" ></div> <script type="text/javascript" src="https://login.smoobu.com/js/Apartment/CalendarWidget.js"></script></div>
				--><?php } 
				if($n_id==11){ ?>
			    <a href="room1_AB.php"class="sv_btn sv_btn_default" target="_blank" style="color:#fff">Book Now</a><br><br>
			  <!--  <div id="smoobuApartment1360982de" class="calendarWidget"> <div class="calendarContent" data-load-calendar-url="https://login.smoobu.com/de/cockpit/widget/single-calendar/1360982" data-verification="56b9cbc00d0e48d33b1abe9e8f101d952ef5cccffbe455f68707acfacf60bec1" data-baseUrl="https://login.smoobu.com" data-disable-css="false" ></div> <script type="text/javascript" src="https://login.smoobu.com/js/Apartment/CalendarWidget.js"></script></div>
			    -->	<?php } 
			    	if($n_id==12){ ?>
			    <a href="room1_AB.php"class="sv_btn sv_btn_default" target="_blank" style="color:#fff">Book Now</a><br><br>
                <!--<div id="smoobuApartment1360985de" class="calendarWidget"> <div class="calendarContent" data-load-calendar-url="https://login.smoobu.com/de/cockpit/widget/single-calendar/1360985" data-verification="5edaf7044321180421a4fa6d7565c7797b5f17c9a116cb896c69a467cd4ca736" data-baseUrl="https://login.smoobu.com" data-disable-css="false" ></div> <script type="text/javascript" src="https://login.smoobu.com/js/Apartment/CalendarWidget.js"></script></div>
                --><?php } 
			   if($n_id==13){ ?>
			    <a href="room1_AB.php"class="sv_btn sv_btn_default" target="_blank" style="color:#fff">Book Now</a><br><br>
			   <!-- <div id="smoobuApartment1360988de" class="calendarWidget"> <div class="calendarContent" data-load-calendar-url="https://login.smoobu.com/de/cockpit/widget/single-calendar/1360988" data-verification="567827de934d439ec8b72c9cc3ae0e6715e8a5202338217d19bda4b4caa0b2ce" data-baseUrl="https://login.smoobu.com" data-disable-css="false" ></div> <script type="text/javascript" src="https://login.smoobu.com/js/Apartment/CalendarWidget.js"></script></div>
			   --><?php }
			   	if($n_id==14){ ?>
			    <a href="room1_AB.php"class="sv_btn sv_btn_default" target="_blank" style="color:#fff">Book Now</a><br><br>
			   <!-- <div id="smoobuApartment1360991de" class="calendarWidget"> <div class="calendarContent" data-load-calendar-url="https://login.smoobu.com/de/cockpit/widget/single-calendar/1360991" data-verification="db909a35debf5e3e74cc73a626e3d9e131d4da742e08e5b06f884f3839d30505" data-baseUrl="https://login.smoobu.com" data-disable-css="false" ></div> <script type="text/javascript" src="https://login.smoobu.com/js/Apartment/CalendarWidget.js"></script></div>
			   	-->	
			   <?php } ?>	
				<!--	<form class="contact-form" method="post" action="contactmail.php">
						<div class="row columns_padding_5">

							<div class="col-xs-12 col-md-12 ">
								<div class="filed_form">
									<input type="text" value="" name="name" class="form-control" required placeholder="Full Name" required >
									<input type="hidden" name ="occup" value="<?php echo $get[0]["rooms_titl"]; ?>" />
									<input type="hidden" name ="amount" value="<?php echo $get[0]["rooms_rate"]; ?>" />
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="filed_form">
									<input type="tel" value="" name="phone" class="form-control" required placeholder="Phone" required>
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="filed_form">
									<input type="email" value="" name="email" class="form-control" required placeholder="Email" required>
								</div>
							</div>
				            <div class="col-xs-12 col-md-12">
								<div class="filed_form"><label>Check in Date:</label>
									<input type="date" value="" name="depdate" class="form-control" required placeholder="" required>
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="filed_form"><label>Check out Date:</label>
									<input type="date" value="" name="arrdate" class="form-control" required placeholder="" required>
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="filed_form"><label>Occupants per Room: Adults</label>
								
                            <select name="adults" class="form-control" style="color: #000" required>

                               <option value="0">..Select..</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                            </select>
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="filed_form"><label>Children above 5 years</label>
								 <select name="child" class="form-control" style="color: #000" required>

                               <option value="0">..Select..</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                            </select>
									
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="filed_form">
									<textarea rows="4" cols="45" name="addr" placeholder="Address"></textarea>
								</div>
							</div>
                            <input type="hidden" name="g_id" value="<?php echo $get[0]["rooms_id"]; ?>">
						</div>
						<div class="contact_form_submit">
							<button type="submit" name="submit" class="sv_btn sv_btn_default">Book Now</button>
						</div>
					</form>-->
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
		<div class="col-xs-12 col-md-12 col-lg-12">		<div class="owl-carousel team_carousel sv_arrow_nav">
				<!-- team_card_item -->
		 <?php  for ($i=0; $i < $gets_total ; $i++) { 
		// print_r($get_img);exit;
		 ?> 		
		 <div class="team_card_item">
				
					<div class="team_card_item_img">
							 <a href="valahouse_admn/upload/rooms/<?php echo $get_imgs[$i]['room_img_photo'];?>" data-fancybox="gallery" >
          <img src="valahouse_admn/upload/rooms/<?php echo $get_imgs[$i]['room_img_photo'];?>" alt="Image Gallery">
      
    
        </a>
					</div>
					
				
					
					
					
				</div><!-- END team_card_item -->
				    <?php } ?> 
               
			</div>
	</div>
			
		</div><!--END Start container--><br>
		<!--<iframe width="100%" height="415" src="<?php echo $get[0]["rooms_360"];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
		</div>
	
	</div><!--END type page wrapper-->

	<!--Services Slider-->
	<!--	<section class="our_service light_area section_padding_30_30" id="services">
		<div class="container">
			<div class="section_heading text-center">
				<h2 class="section_heading_title">	COTTAGES</h2>
				
			</div>
			<div class="owl-carousel service_carousel sv_arrow_nav">
				
				                  
                                    <?php
          $act = new Rooms();
$act_img = new Roomsimg();
            $act_cntnt = $act-> getAllRoomsDetails();
            $act_cntnt_cont = count($act_cntnt);


            for ($i=0; $i <$act_cntnt_cont ; $i++) { 
                # code...
                $act_id = $act_cntnt[$i]["rooms_id"]; 
                    $get_act_img = $act_img->getAcimg_act($act_id);
                    if($n_id!=$act_id)
                    {
            
   ?> 
				<div class="item_service_card">
					<div class="image_service">
						<img src="valahouse_admn/upload/rooms/<?php echo $get_act_img[0]["room_img_photo"];?>" alt="">
					</div>
					<div class="describe_service">
						<h4 class="name_service">
							<?php echo $act_cntnt[$i]['rooms_titl'];?>
						</h4>
					</div>
					<div class="overlay">
						<h4 class="name_service">
							<a href="#"><?php echo $act_cntnt[$i]['rooms_titl'];?></a>
						</h4>
							<p><?php  $contn= strip_tags($act_cntnt[$i]['rooms_dscr']);
                            if(strlen($contn)>170)
                            {
                                $subcon=substr($contn, 0, 170);
                                $contn = substr($subcon, 0, strrpos($subcon, ' '));
                            }
                         echo $contn; echo" ...";?></p>
					
						<p><a href="cottage_details.php?g_id=<?php echo $act_cntnt[$i]["rooms_id"];?>">Read More</a></p>
					</div>
				</div>
				
	   <?php } } ?>			
				
				<div class="item_service_card">
					<div class="image_service">
						<img src="assets/images/santi.jpg" alt="">
					</div>
					<div class="describe_service">
						<h4 class="name_service">
							Shanti
						</h4>
					</div>
					<div class="overlay">
						<h4 class="name_service">
							<a href="#">Shanti</a>
						</h4>
						<p>From here there are picturesque views over the lake which can be enjoyed and contemplated from comfortable cane lounge chairs. Inside, plenty of sunlight streams in thanks to the large windows from which the views can also be enjoyed thanks to the built-in window seats..</p>
					<p><a href="#">Read More</a></p>
					</div>
				</div>
				<div class="item_service_card">
					<div class="image_service">
						<img src="assets/images/endless-view-suites.jpg" alt="">
					</div>
					<div class="describe_service">
						<h4 class="name_service">
							Endless View Suite
						</h4>
					</div>
					<div class="overlay">
						<h4 class="name_service">
							<a href="#">Endless View Suite</a>
						</h4>
						<p>The Endless View Suite is located in the main building and has a wide veranda with sweeping panoramic views over the lake and gardens.</p>
					<p><a href="#">Read More</a></p>
					</div>
				</div>
				<div class="item_service_card">
					<div class="image_service">
						<img src="assets/images/garden-cottege-1.jpg" alt="">
					</div>
					<div class="describe_service">
						<h4 class="name_service">
							Garden Cottage
						</h4>
					</div>
					<div class="overlay">
						<h4 class="name_service">
							<a href="#">Garden Cottage</a>
						</h4>
						<p>Bird watchers will delight in the many different species who make the gardens their home and gently wake its guests with their melodious birdsong.</p>
					<p><a href="#">Read More</a></p>
					</div>
				</div>
				
			</div>
		</div>
	</section>-->
	
	  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'></script>
<?php include('footer.php'); ?>