<?php
// Main contains functions for main parts of the site like html, head, meta tags, loaded resources & much more.

function mainTopStart() { // This contains <DOCTYPE! html>, <html>, <head>
	// Add HTML code.
	$html = '<!DOCTYPE html>
<html>
	<head> ';
	return $html;
}

function mainTopEndStart() { // This contains meta, links, loaded resources, </head>, <body>
	// Add HTML code.
	$html = '<meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="styles/style.css?v=2.6.3" rel="stylesheet" type="text/css">
            <link rel="shortcut icon" href="https://raw.githubusercontent.com/EthanAVideos/projects-for-mikesmopars/main/MikesMopars%20Logos/mikesmopars02.png" /> <!-- Browser Tab Icon -->
	    			<!-- Google Loaded Data -->
	   		 
	    </head>
	    <body>';
	return $html;
}

function mainSiteEnd() { // This contains </body>, </html>
	// Add HTML code.
	$html = '	
	</body>
</html>';
	return $html;
}

// Navbars

function navBar() { 
	$html = '<!-- PC Navbar -->
<div id="navbar"><br>
		<a href="index" id="nav-element">Home</a>
      <a href="gallery" id="nav-element">Gallery</a>
		<a href="73-duster" id="nav-element">73 Duster</a>
		<a href="03-dram" id="nav-element">03 Dodge Ram</a>
      <a href="77-d300" id="nav-element">77 D300</a>
        <!-- Navbar Menu -->
        <!-- <a href="#" onclick="mainNavmenuOpen(event)"  id="nav-main-menu-element"><img src="content/images/site-art/menu_24dp_FILL0_wght400_GRAD0_opsz24.svg"></a> -->
        
        <h6 id="semver">Date: 06/09/24 - SemVer Version: 2.6.3</h6>
</div>
<div id="navmenu" style="visibility: hidden;"><br>
        <center>
        		<a href="fileName" id="nav-menu-element">Page 1</a> <br><br><br>
        		<a href="fileName" id="nav-menu-element">Page 1</a> <br><br><br>
        		<a href="fileName" id="nav-menu-element">Page 1</a> <br><br><br>
        	</center>
        </div>
        
        <!-- Mobile NavBar -->
        <a href="#" onclick="mobileNavmenu(event)"  id="nav-mobile-menu-element1"><img src="content/images/site-art/menu_24dp_FILL0_wght400_GRAD0_opsz24.svg"></a>
        
</div>
<div id="navMobilemenu"><br>
        <center>
        		<a href="gallery" id="nav-mobile-menu-element">Gallery</a> <br><br><br>
        		<a href="73-duster" id="nav-mobile-menu-element">73 Duster</a> <br><br><br>
        		<a href="03-dram" id="nav-mobile-menu-element">03 Dodge Ram</a> <br><br><br>
        		<a href="77-d300" id="nav-mobile-menu-element">77 D300</a> <br><br><br>
        	</center>
        </div>
<!-- End Of Navbars -->';

	return $html;
}

// JAVA SCRIPT
function clickMenuTwo() {
	$jsCode =<<<EOF
	<script>
    document.addEventListener('DOMContentLoaded', (event) => {
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();

        let existingMenu = document.getElementById("ctxmenu");
        if (existingMenu) {
            existingMenu.remove();
        }

        let menu = document.createElement("div");
        menu.id = "ctxmenu";
        menu.style.top = (e.clientY) + "px";
        menu.style.left = (e.clientX) + "px";
        menu.onmouseleave = function() { menu.remove(); };
        menu.innerHTML = `
                <p onclick='alert("Sorry, You Do Not Have Right Click Menu Permissions!")'>You Do Not Have Right Click Permissions!</p><br><br><br>
        			<!--  <p>Option2</p>
                <p>Option3</p>
                <p>Option4</p> 
                <p onclick='alert("Thank you!")'>Upvote</p> -->
            `;
        document.body.appendChild(menu);

        // Ensure the menu is within the viewport
        let menuRect = menu.getBoundingClientRect();
        if (menuRect.bottom > window.innerHeight) {
            menu.style.top = (window.innerHeight - menuRect.height - 10) + "px";
        }
        if (menuRect.right > window.innerWidth) {
            menu.style.left = (window.innerWidth - menuRect.width - 10) + "px";
        }
    });
});
    </script>
EOF;

	return $jsCode;
}

function navBarMenus() {
	$jsCode =<<<EOF
	<script>
	function mainNavmenuOpen(event) {
    document.getElementById("navmenu").style.visibility = "visible";
    event.stopPropagation(); // Stop the click event from propagating further

    // Add event listener to the document
    document.addEventListener('click', function(event) {
        var targetElement = event.target; // Get the clicked element

        // Check if the clicked element is not the target element or its descendant
        if (!targetElement.closest('#navmenu')) {
            // If clicked outside the target element, hide it
            document.getElementById("navmenu").style.visibility = "hidden";
        }
    });
}
</script>

<script>
	function mobileNavmenu(event) {
    document.getElementById("navMobilemenu").style.visibility = "visible";
    event.stopPropagation(); // Stop the click event from propagating further

    // Add event listener to the document
    document.addEventListener('click', function(event) {
        var targetElement = event.target; // Get the clicked element

        // Check if the clicked element is not the target element or its descendant
        if (!targetElement.closest('#navMobilemenu')) {
            // If clicked outside the target element, hide it
            document.getElementById("navMobilemenu").style.visibility = "hidden";
        }
    });
}
</script>

EOF;

	return $jsCode;
}

/* Detect Browser Function  */
function detectUnsupportedBrowsers() {
	$jsCode =<<<EOF
	<script>
        function detectBrowser() {
            var userAgent = navigator.userAgent;

            if (userAgent.indexOf("Chrome") > -1 && userAgent.indexOf("Edg") === -1) {
                // Redirect for Google Chrome or Chromium
                window.location.href = "unsupported_browser_detected.php";
            } else if (userAgent.indexOf("Edg") > -1) {
                // Redirect for Microsoft Edge
                window.location.href = "unsupported_browser_detected";
            } else if (userAgent.indexOf("MSIE") > -1 || userAgent.indexOf("Trident/") > -1) {
                // Redirect for Internet Explorer
                window.location.href = "unsupported_browser_detected";
            }
        }

        // Run the browser detection function on page load
        window.onload = detectBrowser;
    </script>
	
EOF;

	return $jsCode;
}

function clickMenu() {
	$jsCode =<<<EOF
<script>
	if (document.addEventListener) {
  document.addEventListener('contextmenu', function(e) {
    alert("You Don't Have Right Click Menu Permissions... :-("); //here you draw your own menu
    e.preventDefault();
  }, false);
} else {
  document.attachEvent('oncontextmenu', function() {
    alert("You've tried to open context menu");
    window.event.returnValue = false;
  });
}
</script>
EOF;

	return $jsCode;
}

function siteMap() {
	$jsCode =<<<EOF
	<script>
        window.addEventListener('load', function() {
            // Function to check URL and perform actions
            function checkUrlAndAct() {
                if (window.location.hash === '#sitemap') {
                    // Open new tab with sitemap.png
                    window.open('content/images/site-art/sitemap.png', '_blank');

                    // Wait 2 seconds and then remove #sitemap from the URL
                    setTimeout(function() {
                        window.history.replaceState({}, document.title, window.location.pathname + window.location.search);
                    }, 2000);
                }
            }

            // Call the function to check URL on page load
            checkUrlAndAct();

            // Optionally, listen for hash changes
            window.addEventListener('hashchange', checkUrlAndAct, false);
        });
	</script>
EOF;

	return $jsCode;
}

/*
 Templates

function funcNameHere() {
	$jsCode =<<<EOF
	
EOF;

	return $jsCode;
}



function funcNameHere() { 
	$html = '';

 return $html;
}

*/
?>