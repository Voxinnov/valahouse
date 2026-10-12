<?php include('menu.php');
 
 $back    =   new Background();                 

$get    =   $back->getGallery(8); 
?>
	
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
		<!--type page wrapper-->
	<!--type page wrapper-->
	<div class="type_page_wrapper section_padding_60_60" style="margin-top:100px">

		<!--Start container-->
		<div class="container" style="background-color:#eeeeeee0; padding:20px">
		
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-4">
				
					<div class="sidebar_block light_area">

					
						<h4>DISTANCE</h4>
							<p align="justify">
						<?php echo $cnt_cont[0]["cnt_distnc"];?>
						</p>
					</div>
						<div class="sidebar_block light_area">

					
						<h4>RESERVATIONS & INFO</h4>
							<p align="justify"><br>
							    <?php echo $cnt_cont[0]["cnt_adrs"];?><br><br>
						
Villa Host<br>

<a href="tel:<?php echo $cnt_cont[0]["cnt_no"];?>"><?php echo $cnt_cont[0]["cnt_no"];?></a><br><br>
Reservation<br>
<a href="tel:<?php echo $cnt_cont[0]["cnt_bno"];?>"><?php echo $cnt_cont[0]["cnt_bno"];?></a><br>
<a href="mailto:<?php echo $cnt_cont[0]["cnt_email"];?>" ><?php echo $cnt_cont[0]["cnt_email"];?></a>

						
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
					<div class="sidebar_right">
					
						<div class="sidebar_block light_area">
							<div class="widget_recent_post">
							
								
								<form class="contact-form" method="post" action="sendmail.php">
						<div class="row columns_padding_5">

							<div class="col-xs-12 col-md-12 ">
								<div class="filed_form">
									<input type="text" value="" name="name" class="form-control" required placeholder="Full Name" required >
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="filed_form">
									<input type="tel" value="" name="phone" class="form-control" required placeholder="Phone" required>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="filed_form">
									<input type="email" value="" name="email" class="form-control" required placeholder="Email" required>
								</div>
							</div>
				
							<div class="col-xs-12 col-md-12">
								<div class="filed_form">
									<textarea rows="4" cols="45" name="message" placeholder="Message" required></textarea>
								</div>
							</div>

						</div>
						<div class="contact_form_submit">
							<button type="submit" name="contact_submit" class="sv_btn sv_btn_default">Submit</button>
						</div>
					</form>
					
								
							</div>
						</div>
					
						
					</div>
					
						<iframe src="<?php echo $cnt_cont[0]["cnt_lcn"];?>" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				
				</div>
				
		</div>
			
		</div><!--END Start container-->
		
	</div><!--END type page wrapper-->
	<section id="services" class="section_padding_30_30">
    <div class="container">
			</section>
	<!--Services Slider-->
<?php include('footer.php'); ?>
