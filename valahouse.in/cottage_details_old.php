<?php include('menu.php'); 
$n_id=  $_GET["g_id"];
//print_r($n_id); exit;
 $act = new Rooms();
 $get    =   $act->getRooms($n_id);
$act_img = new Roomsimg();
$get_img = $act_img->getAcimg_act($n_id);
$get_total= count($get_img);
  $back    =   new Background();                 

$get1    =   $back->getGallery(10);?>
	
	<!--Page headet title-->
	<div class="header_title pade_bg5 d-flex justify_content_center align_items_center bg_overlay1"  style="background-image: url(valahouse_admn/upload/rooms/<?php echo $get[0]["rooms_banner"];?>);">
		<div class="container">
			<h1 class="page_title"></h1>
			<ul class="page-list">
				<li><a href="#"></a></li>
				<li></li>
				<li></li>
			</ul>
		</div>
	</div><!--END Page headet title-->
	
	
		<!--type page wrapper-->
	<div class="type_page_wrapper section_padding_60_60">

		<!--Start container-->
		<div class="container">
		
			<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12 item_content">	<h2 class="entry-title text-center"><?php echo $get[0]["rooms_titl"];?></h2></div>
				<div class="col-xs-12 col-md-12 col-lg-12">
				
					<div class="gallery_item owl-carousel float_nav">
					    <?php 
                                                        for ($i=0; $i < $get_total ; $i++) { 
                                                    
                                                    ?>
						<div class="item">
							<a href="valahouse_admn/upload/rooms/<?php echo $get_img[$i]['room_img_photo'];?>" class="see_big_pic hover_link_effect">
								<i class="fas fa-search"></i>
								<img src="valahouse_admn/upload/rooms/<?php echo $get_img[$i]['room_img_photo'];?>" alt="" style="max-height:400px">
							</a>
						</div>
						      <?php } ?>
				
					
					</div>
				
					<div class="item_content">

					
						
							<p align="justify">
							 <?php echo $get[0]["rooms_dscr"];?></p>
							<p  align="justify" >There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
						<?php echo $get[0]["rooms_inclusion"];?></p>
							<br>
						
						<div align="center"><a href="https://www.secure-booking-engine.com/accounts/JGpmUdp0OtYxPiprLVnvdQ/properties/t4LVi6r8iV3X9FnoUdUE9A/booking-engine/web/source/4wsctBw6Oq6j-g9XuxeRzQ/cart/YtbhHhnj4m9aGUewpMKt6g/#/search" target="_blank" class="sv_btn sv_btn_default">Book Now</a></div>
					</div>
					
				</div>
				
			<!--	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
					<div class="sidebar_right">
					
						<div class="sidebar_block light_area">
							<div class="widget_recent_post">
								<h4 class="widget_title">Book Now</h4>
								
								<form class="contact-form" method="post" action="#">
						<div class="row columns_padding_5">

							<div class="col-xs-12 col-md-12 ">
								<div class="filed_form">
									<input type="text" value="" name="name" class="form-control" required placeholder="Name">
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="filed_form">
									<input type="tel" value="" name="phone" class="form-control" required placeholder="Phone">
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="filed_form">
									<input type="email" value="" name="email" class="form-control" required placeholder="Email">
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="filed_form"> 
								<label>Check In</label>
									<input type="date" value="" name="chkin" class="form-control" placeholder="Check In">
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="filed_form">
								    	<label>Check Out</label> 
									<input type="date" value="" name="chkout" class="form-control" placeholder="Check Out">
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="filed_form">
									<textarea rows="4" cols="45" name="message" placeholder="Address"></textarea>
								</div>
							</div>

						</div>
						<div class="contact_form_submit">
							<button type="submit" name="contact_submit" class="sv_btn sv_btn_default">Submit</button>
						</div>
					</form>
					
								
							</div>
						</div>
					
						
					</div>
				</div>-->
				
		
			
		</div><!--END Start container-->
		
	</div><!--END type page wrapper-->
	<section id="services" class="section_padding_30_30">
    <div class="container">
<iframe width="100%" height="415" src="<?php echo $get[0]["rooms_360"];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
		</section>
	<!--Services Slider-->
		<section class="our_service light_area section_padding_30_30" id="services">
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
	</section>
<?php include('footer.php'); ?>