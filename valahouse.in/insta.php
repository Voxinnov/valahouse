<!DOCTYPE html>
<html>
<head>
	<title>Instafeed on Your Website</title>
	<style type="text/css">
		a img{ 
			width: 25%;
		}
	</style>
</head>
<body>
	<h1 style="text-align: center">Show Instagram Feed on your Website</h1>
    
    
    <div class="slideshow-container" id=" first">

 <!-- Full-width images with number and caption text -->
        	<div id="instafeed-container"></div>


 <!-- Next and previous buttons -->
 <a class="prev" onclick="plusSlides(-1, 'first', 'firstSliderIndex')">&#10094;</a>
  <a class="next" onclick="plusSlides(1, 'first', 'firstSliderIndex')">&#10095;</a>
  <br />
  <!-- The dots/circles -->

</div>

 

	<script src="instafeed2.min.js"></script>
	<script type="text/javascript">
	var userFeed = new Instafeed({
		get: 'user',
		target: "instafeed-container",
    	resolution: 'low_resolution',
		accessToken: 'IGQVJVTWNsX25PS29PZA3JaZAnk5bWRBU3ZABNEJDZAU16cU9mR0VrQ3d4MU1LWEF1c2xJV3BOR0J3ajNJUjljOXRUUjc2WGc2RDBKbXlnNEpzRFVuUXNMR3JEN2FMS3ZAmVUg0bHRwc1E3dEswYmxGMmFFNQZDZD'
	});
	userFeed.run();
	</script>
	<script>
    var indexes = {
        firstSliderIndex: 1,
        secondSliderIndex: 2,
    };
    showSlides(indexes.firstSliderIndex, 'first', 'firstSliderIndex');
    // Next/previous controls
    function plusSlides(n, id, index) { // n - number of slide, id - container id, index - current slide number in slider
        showSlides(indexes[index] += n, id, index);
    }
    // Thumbnail image controls
    function currentSlide(n, id, index) {
        showSlides(indexes[index] = n, id, index);
    }

    function showSlides(n, id, index) {
        var i;
        var slides = document.querySelectorAll(`#${id} .mySlides`);
        var dots = document.querySelectorAll(`#${id} .dot`);
        if (n > slides.length) {
            indexes[index] = 1;
        }
        if (n < 1) {indexes[index] = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[indexes[index]-1].style.display = "block";
        dots[indexes[index]-1].className += " active";
    }
</script>

</body>
</html>