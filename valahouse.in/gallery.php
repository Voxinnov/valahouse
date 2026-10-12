<?php include('menu.php'); 
 $back    =   new Background();                 

$get    =   $back->getGallery(5);	?>

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
					
					<div class="content-column col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="sec-title text-center">
				<h2 class="section_heading_title" >
						Gallery
					</h2>
						</div>
					
					
					
					</div>
				
				
				</div>
				
			
			</div>
			
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
			
			
		</div><!--END Start container-->

	</div><!--END type page wrapper-->
	
	
	  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'></script>


<?php include('footer.php'); ?>
