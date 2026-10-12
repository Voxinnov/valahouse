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
	
	<!--Page headet title-->
	<div class="header_title pade_bg5 d-flex justify_content_center align_items_center bg_overlay1" style="background-image: url(valahouse_admn/upload/Gallery/<?php echo $get1[0]["back_img_img"];?>);">
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

			<div class="about_section">
			
			
				
				<div class="row">
					
					<div class="content-column col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="sec-title text-center">
				<h2 class="section_heading_title" >
						COTTAGES
					</h2>
						</div>
					
					
					<p align="justify">
						

<?php echo $get[0]["activity_dscrptn"];?> </p>
						
					</div>
				
				
				</div>
				
			
			</div>
			
		</div><!--END Start container-->

	</div><!--END type page wrapper-->
	
	

	<!--Services Slider-->
	<div class="related_card_area light_area section_padding_60_60">
		
		
		<div class="container">
				<div class="owl-carousel team_carousel sv_arrow_nav">
			                               <?php     for ($i=0; $i <$get_total ; $i++) { 
                # code...
                $act_id =$get_img[$i]['facility_id'] ;
            $act_img_cnt = $act_img->getGalimg_act($act_id);
            
            

                  
?>
				<!-- team_card_item -->
				<div class="team_card_item">
					<div class="team_card_item_img">
						<img src="valahouse_admn/upload/Gallery/<?php echo $act_img_cnt[0]['fclty_img_file'];?>" alt="">
					</div>
					
					<div class="overlay">
						<h4 class="team_card_item_name" style="text-align:center;">
							<a href="#" style="text-align:center;"><?php echo $get_img[$i]['facility_title'] ?></a><br><br>
						</h4>
					
						<div class="social_team" style="text-align:center;">
							 <?php 
                                                       for ($j=0; $j < count($act_img_cnt) ; $j++) { 
                                                    
                                                    ?>	<a href="valahouse_admn/upload/Gallery/<?php echo $act_img_cnt[$j]['fclty_img_file'];?>" class="see_big_pic"><?php if($j==0){ ?><i class="fas fa-search"></i> <?php } ?></a>
                                                      <?php  } ?>
						</div>
					</div>
				</div><!-- END team_card_item -->
				   <?php } ?> 
			
			</div>
	
		</div>
		
	</div><!--END related card slider-->
<div class="type_page_wrapper section_padding_60_60">	
	<div class="container">

			<div class="row">
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
							<a href="cottage_details.php?g_id=<?php echo $act_cntnt[$i]["rooms_id"];?>" class="hover_link_effect">
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
	</div>
<?php include('footer.php'); ?>