<?php
// Calling needed php template files.
require 'php/main.php';

echo mainTopStart(); 
?>
<title>Mikes Mopars</title>
<?php echo mainTopEndStart(); 
echo detectUnsupportedBrowsers();?>

<!-- Navbars -->
<?php echo navBar(); 
echo navBarMenus();?>
<!-- Body Start -->
<center>
	<img id="home-img" src="content/images/imageSystem/73-duster/ChallengerDuster.jpg" alt="If this text is seen a image failed to load." title="Home page image banner.">
	<br>
	<hr>
	<h2>Latest Events</h2><br>
	<a onclick="latestEventsOne()" ><img src="content/images/imageSystem/73-duster/i3.jpg" alt="" width="300px" height="300px" style="cursor: pointer;"></a> 
	<a onclick="latestEventsOne()" ><img src="content/images/imageSystem/73-duster/i5.jpg" alt="" width="300px" height="300px" style="cursor: pointer;"></a> 
	<a onclick="latestEventsOne()" ><img src="content/images/imageSystem/73-duster/i4.jpg" alt="" width="300px" height="300px" style="cursor: pointer;"></a>
	<br>
	<hr>
	<br>
	<h2>Mikes Mopars / Dad Hobbys</h2>
	<br>
	<p>Go check out what project I'm working on now! <a href="03-dram" >Latest Project</a></p><br><br>
</center>
<!-- Body End -->

<!-- Latest Events image description & redirect JS feature  -->
<script type="text/javascript" >
function latestEventsOne() {
	alert("Description -"+"\n"+""+"\n"+" 1973 Plymouth Duster won  first place at the 17th Annual Mopars at junction show & swap meet 2024 for 1972 - 2002 Factory Muscle."+"\n"+""+"\n"+""+"\n"+" Click Ok To Be Redirected To Duster 73 Page!");
	window.location.href = "73-duster.php";
}
</script>

<?php
echo siteMap();
echo clickMenuTwo();
 echo mainSiteEnd(); ?>

