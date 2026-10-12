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
					
					<div class="content-column col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="sec-title text-center">
				<h2 class="section_heading_title" >
						OUR STORY
					</h2>
						</div>
					
					
					<p align="justify">
						
<?php echo $abtContent[0]['abt_dscrpn']; ?></p>
						
					</div>
				
				
				</div>
				
			
			</div>
			
				<div class="owl-carousel team_carousel sv_arrow_nav">
				<!-- team_card_item -->
		 <?php for($i=0;$i< $total_abtga;$i++){
		 $amid=$get_abtga[$i]['about_img_id'];
		 
		 $get_img = $abtga->getGalimg_act($amid);
		// print_r($get_img);exit;
		 ?> 		
		 <div class="team_card_item">
				
					<div class="team_card_item_img">
							 <a href="valahouse_admn/upload/Gallery/<?php echo $get_img[0]['abt_img_file'];?>" data-fancybox="gallery<?php echo $i; ?>" >
          <img src="valahouse_admn/upload/Gallery/<?php echo $get_img[0]['abt_img_file'];?>" alt="Image Gallery">
      
      <?php for($j=1;$j<count($get_img);$j++){ ?>
      <a href="valahouse_admn/upload/Gallery/<?php echo $get_img[$j]['abt_img_file'];?>" data-fancybox="gallery<?php echo $i; ?>" ></a>
      <?php } ?>
        </a>
					</div>
					
				
					
					
					
				</div><!-- END team_card_item -->
				    <?php } ?> 
               
			</div>
	
			
		</div><!--END Start container-->

	</div><!--END type page wrapper-->
	
	
	  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'></script>


<?php include('footer.php'); ?>