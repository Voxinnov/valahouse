
<?php include('menu.php');
 
 $back    =   new Background();                 

$get    =   $back->getGallery(8);
$rm_name = $_GET['room'];
$Obj  = new About();
$abtContent= $Obj->getAboutterms(5);

                     
?>
	
 <style>
      html::before {

  content: ' ';

  display: block;

  background-image: url("assets/images/0018.jpg");

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
		<!--type page wrapper-->
	<!--type page wrapper-->
	<div class="type_page_wrapper section_padding_60_60" style="margin-top:100px">

		<!--Start container-->
		<div class="container" style="background-color:#eeeeeee0; padding:20px">
		
			<div class="row">
			
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="sidebar_right">
					
						<div class="sidebar_block light_area">
							<div class="widget_recent_post">
							 	 <?php echo $abtContent[0]['abt_dscrpn']; ?>
							    
								<H2>PAY NOW</H2>
								
								<form class="contact-form" action="payment_action.php" target="_blank" method="post" >
						<div class="row columns_padding_5">

							<div class="col-xs-8 col-md-8 ">
								<div class="filed_form">
								<label>Name</label>	<input type="text"  name="name" class="form-control" required>
									<label>Check In Date</label>		<input type="date" name ="ad" value="<?php echo $ad;?>"  required />
									<label>Remark </label>		<input type="text" name ="remark" required/>
									<input type="submit" name ="submit" value="submit" />	
								</div>
							</div>
							<div class="col-xs-4 col-md-4 ">
							    <img src="assets/images/qrcode.png" />
							    </div>

						</div>
				</form>
							</div>
						</div>
					
						
					</div>
					
						
				
				</div>
				
		</div>
			
		</div><!--END Start container-->
		
	</div><!--END type page wrapper-->
	<section id="services" class="section_padding_30_30">
    <div class="container">
			</section>

	<!--Services Slider-->
<?php include('footer.php'); ?>