<?php include('menu.php'); 
$Obj  = new About();
                    $abtContent= $Obj->getAbout();		
	//print_r($cnt_cont)	;exit;
	$abtga=new Aboutgallery();
	$get_abtga = $abtga->getAllGalimgDetails();
//	print_r($get_abtga)	;exit;
	$total_abtga = count($get_abtga);
    $back    =   new Background();                 

$get    =   $back->getGallery(1);
 ?>

	
	<!--Page headet title-->
	<div class="header_title pade_bg5 d-flex justify_content_center align_items_center bg_overlay1" style="background-image: url(valahouse_admn/upload/Gallery/<?php echo $get[0]["back_img_img"];?>);">
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
						OUR STORY
					</h2>
						</div>
					
					
					<p align="justify">
						
<?php echo $abtContent[0]['abt_dscrpn']; ?></p>
						
					</div>
				
				
				</div>
				
			
			</div>
			
		</div><!--END Start container-->

	</div><!--END type page wrapper-->
	
	

	<!--Services Slider-->
	<div class="related_card_area light_area section_padding_60_60">
		
		
		<div class="container">
				<div class="owl-carousel team_carousel sv_arrow_nav">
				<!-- team_card_item -->
		 <?php for($i=0;$i< $total_abtga;$i++){ ?> 		
		 <div class="team_card_item">
				
					<div class="team_card_item_img">
						<img src="valahouse_admn/upload/Gallery/<?php echo $get_abtga[$i]['abt_img_file'];?>" alt="">
					</div>
					
					<div class="overlay">
						<h4 class="team_card_item_name" style="text-align:center;">
							<a href="#" style="text-align:center;"><?php echo $get_abtga[$i]['abt_img_name'];?></a><br><br>
						</h4>
					
					</div>
				</div><!-- END team_card_item -->
				    <?php } ?> 
               
			</div>
	
		</div>
		
	</div><!--END related card slider-->

<?php include('footer.php'); ?>