<?php
// Calling needed php template files.
require 'php/main.php';

echo mainTopStart(); 
?>
<title>Unsupported Browser Detected</title>
<?php echo mainTopEndStart(); 
echo detectUnsupportedBrowsers();?>

<!-- Navbars -->
<?php // echo navBar(); ?>
<!-- Body Start -->
<script>
        function detectBrowser() {
            var userAgent = navigator.userAgent;
            var message = "";

            if (userAgent.indexOf("MSIE") > -1 || userAgent.indexOf("Trident/") > -1) {
                // Internet Explorer detected
                message = "We detect your using 'Internet Explorer' This browser is not supported, for your security / privacy please use Safari or Firefox.";
            } else if (userAgent.indexOf("Edg") > -1) {
                // Microsoft Edge detected
                message = "We detect your using 'Microsoft Edge' This browser is not supported for your security / privacy please use Safari or Firefox.";
            } else if (userAgent.indexOf("Chrome") > -1 && userAgent.indexOf("Edg") === -1) {
                // Google Chrome detected
                if (userAgent.indexOf("Chromium") > -1) {
                    // Chromium detected
                    message = "We detect your using 'Chromium' This browser is not supported for your security / privacy please use Safari or Firefox.";
                } else {
                    message = "We detect your using 'Google Chrome' This browser is not supported for your security / privacy please use Safari or Firefox.";
                }
            } else {
                // Other browsers detected
                var browserName = userAgent.split(' ')[userAgent.split(' ').length - 1].split('/')[0];
                message = `"${browserName}" detected! This browser is supported by us. <a href="index">Home Page</a>`;
            }

            document.getElementById("message").innerHTML = message;
        }

        // Run the browser detection function on page load
        window.onload = detectBrowser;
    </script>
</head>
<body>
    <h1>Browser Detection</h1>
    <h3 id="message"></h3>
<!-- Body End -->

<?php
echo clickMenuTwo();
 echo mainSiteEnd(); ?>