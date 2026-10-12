
	<!-- main_footer -->
	<footer class="main_footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-3 footer_block">
					<img src="assets/images/valahouse.png" alt="" style="width:100px">
			<p><a href="termsandcondition.php" style="color: #fff">Terms and Conditions</a> <br>
				<a href="privacypolicy.php" style="color: #fff">Privacy Policy</a> <br>
				<a href="refundandcancellation.php" style="color: #fff">Refund & Cancellation </a></p>	
				</div>
				<div class="col-md-6 col-lg-3 footer_block">
					<div class="social_wg">
						<h6 class="footer_block_title">Socials Media</h6>
						<p><a href="<?php echo $cnt_cont[0]["cnt_twtr"];?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
						<a href="<?php echo $cnt_cont[0]["cnt_fb"];?>" target="_blank"><i class="fab fa-facebook-square"></i></a>
						<a href="<?php echo $cnt_cont[0]["cnt_ytb"];?>" target="_blank"><i class="fab fa-youtube"></i></a>
						<a href="<?php echo $cnt_cont[0]["cnt_insta"];?>" target="_blank"><i class="fab fa-instagram"></i></a></p>
						<p><a href="<?php echo $cnt_cont[0]["cnt_vemio"];?>" target="_blank"><i class="fab fa-vimeo"></i></a>
						<a href="<?php echo $cnt_cont[0]["cnt_flckr"];?>" target="_blank"><i class="fab fa-flickr"></i></a>
						<a href="<?php echo $cnt_cont[0]["cnt_blgr"];?>" target="_blank"><i class="fab fa-blogger"></i></a>
						<a href="<?php echo $cnt_cont[0]["cnt_trpadv"];?>" target="_blank"><i class="fab fa-tripadvisor"></i></a></p>

					</div>
											<br><p>Reservation<br>
<a href="mailto:<?php echo $cnt_cont[0]["cnt_email"];?>" style="color: #fff;"><?php echo $cnt_cont[0]["cnt_email"];?></a><br>
<a href="tel:<?php echo $cnt_cont[0]["cnt_bno"];?>" style="color: #fff;"><?php echo $cnt_cont[0]["cnt_bno"];?></a>
</p>
				</div>
				
				<div class="col-md-6 col-lg-3 footer_block">
						<h6 class="footer_block_title">Contact us</h6>
						<p><?php echo $cnt_cont[0]["cnt_adrs"];?></p><br>
<p>Villa Host<br>
<a href="tel:<?php echo $cnt_cont[0]["cnt_no"];?>" style="color: #fff;"><?php echo $cnt_cont[0]["cnt_no"];?></a>
</p>
				</div>
				<div class="col-md-6 col-lg-3 footer_block">
						<h6 class="footer_block_title">Location</h6>
						<iframe src="<?php echo $cnt_cont[0]["cnt_lcn"];?>" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				</div>
			</div>
		</div>
	</footer><!-- END main_footer -->
	
	<!-- JS -->
	<!--jQuery 1.12.4 google link-->
	<script src="ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!--Bootstrap 4.1.0-->
	<script src="assets/libs/bootstrap-4.1.0/bootstrap.min.js"></script>
	<!--shuffle-->
	<script src="assets/libs/shuffle/shuffle.min.js"></script>
	<!--jquery.magnific-popup-->
	<script src="assets/libs/jquery.magnific-popup/jquery.magnific-popup.min.js"></script>
	<!--OwlCarousel2-2.3.4-->
	<script src="assets/libs/owlcarousel2-2.3.4/owl.carousel.min.js"></script>
	<!--Custom js-->
	<script src="assets/js/custom.js"></script>

</body>

</html>