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
            Terms & Condition
					</h2>
						</div>
					
					
					<p align="justify">
						Payments can be made either by bank transfer or by credit/debit card. The prices quoted will be in our local currency, Indian Rupees. We are happy to receive payment in any internationally acceptable currency and the holiday price will be converted using the exchange rate stipulated by the Reserve Bank of India on the date the payment is made. Please note, we do not use the exchange rate advertised by several private websites as they are only indicative, not what is actually used for transaction.

Should you wish to transfer money directly to our account then please make sure that any bank charges are borne by the client. We will credit the exact amount that we receive in our account. Any shortfall/ excess will be adjusted against the client account and will be collected/refunded as the case might be. There will be an additional surcharge for payment by credit cards, usually upto 2.5% </p>
						
					</div>
				
				
				</div>
				
			
			</div>
			
		
			
		</div><!--END Start container-->

	</div><!--END type page wrapper-->
	
	
	  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'></script>


<?php include('footer.php'); ?>