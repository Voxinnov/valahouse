<?php include('menu.php');
$g_id=$_GET['g_id'];
$act = new Gallery();
$get_gal =$act ->getGallery($g_id);
$act_img = new Galimg(); 
$act_img_cnt = $act_img->getGalimg_act($g_id);
 
 $back    =   new Background();                 

$get    =   $back->getGallery(7);
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
					
					<div class="content-column col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="sec-title text-center">
				<h2 class="section_heading_title" >
					<?php echo $get_gal[0]['gip_glry_titl']; ?>
					</h2>
						</div>
					
					
					
					</div>
				
				
				</div>
				
			
			</div>
			
			<div class="row grid_pics" id="mixi-container">
			<?php for($i=0;$i<count($act_img_cnt);$i++)
			{
			?>
				<!-- item mixi card -->
				<div class="col-md-3 col-sm-6 no_padding item mix" style="padding:7px">
					<img src="valahouse_admn/upload/Gallery/<?php echo $act_img_cnt[$i]['gal_img_photo'];?>" alt="">
					
					<div class="grid-item-wrapp">
						<div class="psev_table">
							<div class="psev_table_row">
								<div class="project_title">
									<a href="valahouse_admn/upload/Gallery/<?php echo $act_img_cnt[$i]['gal_img_photo'];?>" class="see_big_pic"><i class="fas fa-search"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>	<!--END item mixi card -->
				
				<?php } ?>
		
			
			</div>
			
			
		</div><!--END Start container-->

	</div><!--END type page wrapper-->
	
	
	  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'></script>


<?php include('footer.php'); ?>