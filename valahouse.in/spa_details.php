<?php include('menu.php');
 $g_id = $_GET['g_id'];
      //print_r($g_id);exit;
                $act = new Spa();
                 $act_cntnt = $act-> getSpa($g_id) ;
          $back    =   new Background();                 

$get    =   $back->getGallery(3);
  $act_img = new Spaimg();
     $act_img_cnt = $act_img->getSpaimg_actorder($g_id);?>
 <style>
      html::before {

  content: ' ';

  display: block;

  background-image: url("valahouse_admn/upload/Spa/<?php echo $act_img_cnt[0]["spa_img_img"];?>");

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
<!--	<div class="header_title pade_bg5 d-flex justify_content_center align_items_center bg_overlay1"  style="background-image: url(valahouse_admn/upload/Activity/<?php echo $act_img_cnt[0]["actvty_img_photo"];?>);">
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
		<div class="container" style="background-color:#fff6d6e6; padding:20px">

	<div class="about_section">
			
			
				
				<div class="row">
					
					<div class="content-column col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="sec-title text-center">
				<h2 class="section_heading_title" >
					<?php echo $act_cntnt[0]['spa_title']; ?>
					</h2>
						</div>
					
					
					<p align="justify">
						
 <?php echo $act_cntnt[0]['spa_descr']; ?></p>
						
					</div>
				
				
				</div>
				
			
			</div>
			
		
			<div class="row grid_pics" id="mixi-container">
			
			      <?php 


                                   $act_img_cnt = $act_img->getSpaimg_act($g_id);
                                   $act_img_count = count($act_img_cnt);
                                   //print_r($act_img_cnt);exit;
                                   for ($i=0; $i <$act_img_count ; $i++) { 
                # code...
             

            ?> 	<!-- item mixi card -->
				<div class="col-md-3 col-sm-6 no_padding item mix" data-groups=["rooms"]  style="padding:7px">
					<img src="valahouse_admn/upload/Spa/<?php echo $act_img_cnt[$i]['spa_img_img'];?>" alt="">
					<div class="grid-item-wrapp">
						<div class="psev_table">
							<div class="psev_table_row">
								<div class="project_title">
									<a href="valahouse_admn/upload/Spa/<?php echo $act_img_cnt[$i]['spa_img_img'];?>" class="see_big_pic"><i class="fas fa-search"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>	<!--END item mixi card -->
				      <?php } ?> 
			
			
			</div>
		</div><!--END Start container-->

	</div><!--END type page wrapper-->
	
	


<?php include('footer.php'); ?>