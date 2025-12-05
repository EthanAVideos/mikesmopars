<?php
// Calling needed php template files.
require 'php/main.php';

echo mainTopStart(); 
?>
<title>73 Duster - Images</title>
<?php echo mainTopEndStart(); 
echo detectUnsupportedBrowsers();?>

<!-- Navbars -->
<?php echo navBar(); 
echo navBarMenus();?>
<!-- Body Start -->

<!-- Body End -->

<?php 
echo siteMap();
echo clickMenuTwo();
echo mainSiteEnd(); ?>