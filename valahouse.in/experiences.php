<?php include('menu.php'); 
$act = new Activity();
$act_img = new Acimg(); 
            $act_cntnt = $act-> getAllActivityDetails();
            $act_cntnt_cont = count($act_cntnt);
    $back    =   new Background();                 

$get    =   $back->getGallery(2);
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

			<div class="sec-title text-center">
				<h2>EXPERIENCES</h2>
				<br>
			
			</div>


			<div class="row">
			  <?php 

            for ($i=0; $i <$act_cntnt_cont ; $i++) { 
                # code...
                $act_id =$act_cntnt[$i]['activity_id'] ;
            $act_img_cnt = $act_img->getAcimg_actorder($act_id);
            
            ?>
				<!-- item card -->
				<div class="col-md-12 col-lg-12">
					<div class="item_service_card margin_bottom_30" >
						
						<div class="describe_service">
						    <div class="row">
						        <div class="col-sm-4">
						            	<a href="experience_details.php?g_id=<?php echo $act_cntnt[$i]["activity_id"];?>" class="hover_link_effect">
								<i class="fas fa-ellipsis-h"></i>
								<img src="valahouse_admn/upload/Activity/<?php echo $act_img_cnt[0]['actvty_img_photo'];?>" alt="">
							</a>
						        </div>
						          <div class="col-sm-8">		<h4 class="name_service" style="text-align:left">
								 <?php echo $act_cntnt[$i]['activity_title']; ?>
							</h4>
							<p><?php  $contn= strip_tags($act_cntnt[$i]['activity_dscrptn']);
                            if(strlen($contn)>350)
                            {
                                $subcon=substr($contn, 0, 350);
                                $contn = substr($subcon, 0, strrpos($subcon, ' '));
                            }
                         echo $contn; echo" ...";?></p><a href="experience_details.php?g_id=<?php echo $act_cntnt[$i]["activity_id"];?>">Read More</a></div>
						    </div>
					
						</div>
					</div>
				</div><!--END item card -->
				  <?php } ?>
				<!-- item card -->
				
			</div>
			
		</div><!--END Start container-->

	</div><!--END type page wrapper-->
	
	
	  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'></script>


<?php include('footer.php'); ?>