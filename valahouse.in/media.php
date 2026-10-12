<?php include('menu.php'); 
 $back    =   new Background();                 

$get    =   $back->getGallery(12);	?>

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
		<div class="container" style="background-color:#fff6d6e6; padding:20px">

				<div class="about_section">
			
			
				
				<div class="row">
					
					<div class="content-column col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="sec-title text-center">
				<h2 class="section_heading_title" >
						Media
					</h2>
						</div>
					
					
					
					</div>
				
				
				</div>
				
			
			</div>
			
			<div class="row grid_pics" id="mixi-container">
				<!-- item mixi card -->
		<?php 
		$abtga=new Press();
	$get_abtga = $abtga->getAllAboutgalleryDetails();
//print_r($get_abtga)	;exit;
	$total_abtga = count($get_abtga);

 for($i=0;$i< $total_abtga;$i++){
		 $amid=$get_abtga[$i]['about_img_id'];
		 
		 $get_img = $abtga->getGalimg_act($amid);
		// pr
        ?>
				<div class="col-md-3 col-sm-6 no_padding item mix" style="padding:7px">
				
    	          <a href="valahouse_admn/upload/Gallery/<?php echo $get_img[0]['abt_img_file'];?>" data-fancybox="gallery<?php echo $i; ?>" data-caption="Caption Images 1">
          <img src="valahouse_admn/upload/Gallery/<?php echo $get_img[0]['abt_img_file'];?>" alt="Image Gallery">
        </a> 
        <?php for($j=1;$j<count($get_img);$j++){ ?>
      <a href="valahouse_admn/upload/Gallery/<?php echo $get_img[$j]['abt_img_file'];?>" data-fancybox="gallery<?php echo $i; ?>" data-caption="Caption Images 1"></a>
      <?php } ?>
    	    <!--new item-->
		
					<h5 class="new_name" style="margin: 8px 0 0px 0;" align="center"><?php echo $get_abtga[$i]['about_img_title']; ?></h5>
				</div>
				<?php } ?>
				<!--END item mixi card -->
			
			
			
			
			</div>
			
			
		</div><!--END Start container-->

	</div><!--END type page wrapper-->
	
	
	  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'></script>


<?php include('footer.php'); ?>