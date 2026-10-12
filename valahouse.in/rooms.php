<?php include('menu.php');
$n_id=  1;
$cat    =   new Activity();                 
$get    =   $cat->getActivity($n_id);
$act_img = new Facility();
$get_img = $act_img->getAllFacilityDetails();
//print_r($get_img);exit;
$get_total = count($get_img);
  $back    =   new Background();                 

$get1    =   $back->getGallery(9);?>

 
	  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css'>
 <style>
      html::before {

  content: ' ';

  display: block;

  background-image: url("valahouse_admn/upload/Gallery/<?php echo $get1[0]["back_img_img"];?>");

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
<!--	<div class="header_title pade_bg5 d-flex justify_content_center align_items_center bg_overlay1" style="background-image: url(valahouse_admn/upload/Gallery/<?php echo $get1[0]["back_img_img"];?>);">
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
	
	<!--type page wrapper-->
	<div class="type_page_wrapper section_padding_60_60" style="margin-top:100px">

		<!--Start container-->
		<div class="container" style="background-color:#fff6d6e6; padding:20px">


			<div class="about_section">
			
			
				
				<div class="row">
					
					<div class="content-column col-xl-12 col-lg-12 col-md-12 col-sm-12">
					    <div class="sec-title text-center">
				<h2 class="section_heading_title" >
					
					</h2>
						</div>
					
					
					
					<p align="justify">
						

<?php echo $get[0]["activity_dscrptn"];?> </p>
						
					</div>
				
				
				</div>
				
			
			</div>
			
				<div class="owl-carousel team_carousel sv_arrow_nav">
			                               <?php     for ($i=0; $i <$get_total ; $i++) { 
                # code...
                $act_id =$get_img[$i]['facility_id'] ;
            $act_img_cnt = $act_img->getGalimg_act($act_id);
            
            

                  
?>
	 <div class="team_card_item">
				
					<div class="team_card_item_img">
							 <a href="valahouse_admn/upload/Gallery/<?php echo $act_img_cnt[0]['fclty_img_file'];?>" data-fancybox="gallery<?php echo $i; ?>" >
          <img src="valahouse_admn/upload/Gallery/<?php echo $act_img_cnt[0]['fclty_img_file'];?>" alt="Image Gallery">
      
      <?php   for ($j=0; $j < count($act_img_cnt) ; $j++) { 
                                                    
                                                    ?>	
      <a href="valahouse_admn/upload/Gallery/<?php echo $act_img_cnt[$j]['fclty_img_file'];?>" data-fancybox="gallery<?php echo $i; ?>" ></a>
      <?php } ?>
        </a>
					<h4 class="" style="text-align:center;"><br>
							<?php echo $get_img[$i]['facility_title'] ?><br>
						</h4>	</div>
					
				
					
					
					
				</div>
			
				   <?php } ?> 
			
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
				<div class="col-md-6 col-lg-6">
					<div class="item_service_card margin_bottom_30">
						<div class="image_service">
							<a href="room_details.php?g_id=<?php echo $act_cntnt[$i]["rooms_id"];?>" class="hover_link_effect">
								<i class="fas fa-ellipsis-h"></i>
								<img src="valahouse_admn/upload/rooms/<?php echo $get_act_img[0]["room_img_photo"];?>" alt="">
							</a>
						</div>
						<div class="describe_service">
							<h4 class="name_service">
							<?php echo $act_cntnt[$i]['rooms_titl'];?>	<a href="room_details.php?g_id=<?php echo $act_cntnt[$i]["rooms_id"];?>" style="font-size:15px; text-align:right">Check Availability</a>
							</h4>
							
						</div>
					</div>
				</div><!--END item card -->
			    <?php } ?>  
			
			</div>
			
		</div><!--END Start container-->

	</div><!--END type page wrapper-->
	

	  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'></script>
<?php include('footer.php'); ?>