<?php include('menu.php'); 
$Obj  = new Cornac();
$abtContent= $Obj->getCornac();	?>

	  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css'>
 <style>
      html::before {

  content: ' ';

  display: block;

  background-image: url("valahouse_admn/upload/Cornac/<?php echo $abtContent[0]["cornac_banner"];?>");

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
						<?php echo $abtContent[0]['cornac_title']; ?>
					</h2>
						</div>
					
					
					<p align="justify">
						
<?php echo $abtContent[0]['cornac_desc']; ?> </p>
						
					</div>
				
				
				</div>
				
			
			</div>
				<div class="row">
		<?php 
		$act = new Spa();
$act_img = new Spaimg(); 
            $act_cntnt = $act-> getAllSpaDetails();
            $act_cntnt_cont = count($act_cntnt);
           

            for ($i=0; $i <$act_cntnt_cont ; $i++) { 
                # code...
                $act_id =$act_cntnt[$i]['spa_id'];
            $act_img_cnt = $act_img->getSpaimg_actorder($act_id);
            
            ?>
				<!-- item card -->
				<div class="col-md-6 col-lg-6">
					<div class="item_service_card margin_bottom_30">
						<div class="image_service">
						<img src="valahouse_admn/upload/Spa/<?php echo $act_img_cnt[0]['spa_img_img'];?>" alt="">
					</div>
					<div class="describe_service">
						<h4 class="name_service">
							<?php echo $act_cntnt[$i]['spa_title']; ?>
						</h4>
					</div>
					<div class="overlay">
						<h4 class="name_service">
							<a href="spa_details.php?g_id=<?php echo $act_cntnt[$i]["spa_id"];?>"><?php echo $act_cntnt[$i]['spa_title']; ?></a>
						</h4>
							<p><?php  $contn= strip_tags($act_cntnt[$i]['spa_descr']);
                            if(strlen($contn)>150)
                            {
                                $subcon=substr($contn, 0, 150);
                                $contn = substr($subcon, 0, strrpos($subcon, ' '));
                            }
                         echo $contn; echo" ...";?> </p>
					
						<p><a href="spa_details.php?g_id=<?php echo $act_cntnt[$i]["spa_id"];?>">Read More</a></p>
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