<?php
// PHP Error Handing
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
	
  					<!-- $image_folder = "content/images/imageSystem/77-d300/";
 					$images = glob($image_folder . "*.{JPG,jpg,jpeg,JPEG}", GLOB_BRACE);

  					foreach ($images as $image) {
    				$imageFileName = basename($image);
    				echo "<a href='" . $image . "' target='_blank' title='Click me to view full screen'>";
    				echo "<img src='" . $image . "' alt='If this text is seen a image failed to load.' width='150' height='80' />";
    				echo "</a>";
 					 } -->
				
				<!-- Testing Image System (Code Start) -->
<?php
$image_folder = "content/images/imageSystem/77-d300/";
$images = glob($image_folder . "*.{JPG,jpg,JPEG,jpeg,PNG,png,heif,HEIF,hevc,HEVC}", GLOB_BRACE);

// Sort images by their file name
usort($images, function($a, $b) {
    return strnatcasecmp(basename($a), basename($b));
});

// Function to parse the descriptions file
function parseDescriptions($filePath) {
    $content = file_get_contents($filePath);
    // Remove multiline comments
    $content = preg_replace('!/\*.*?\*/!s', '', $content);
    // Remove single-line comments
    $lines = preg_split('/\R/', $content);
    $descriptions = [];
    foreach ($lines as $line) {
        $line = trim($line);
        if (strpos($line, '#') === 0 || empty($line)) {
            // Skip single-line comments and empty lines
            continue;
        }
        preg_match('/<image>(.*?)<image>\s*<description>(.*?)<description>/', $line, $match);
        if ($match) {
            $descriptions[$match[1]] = $match[2];
        }
    }
    return $descriptions;
}

// Path to the descriptions file
$descriptionFilePath = 'content/images/imageSystem/77-d300/descriptions.idml';
// Get the descriptions array
$descriptions = parseDescriptions($descriptionFilePath);
?>
<!DOCTYPE html>
<html>
<body>
    <?php foreach ($images as $image): ?>
        <a href="#" class="image-link" data-image="<?php echo $image; ?>" data-description="<?php echo htmlspecialchars($descriptions[basename($image)] ?? ''); ?>">
            <img class="test" src="<?php echo $image; ?>" alt="If this text is seen, an image failed to load." width="150" height="80" />
        </a>
    <?php endforeach; ?>

    <div id="overlay">
        <span class="close-button">&times;</span>
        <div class="arrow left" onclick="navigateToImage(currentImageIndex - 1)">&#8249;</div>
        <div class="arrow right" onclick="navigateToImage(currentImageIndex + 1)">&#8250;</div>
        <img id="overlay-image" src="" alt="Full-screen Image" />
        <div class="description" id="image-description"></div>
        <div class="instruction-text">
            Use left & right arrow keys or mouse scroll up & down to change images.
        </div>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const overlay = document.getElementById('overlay');
            const overlayImage = document.getElementById('overlay-image');
            const closeBtn = document.querySelector('.close-button');
            const imageLinks = document.querySelectorAll('.image-link');
            const descriptionDiv = document.getElementById('image-description');
            let currentImageIndex = 0;

            function showOverlay(imageUrl, description) {
                overlayImage.src = imageUrl;
                overlay.style.display = 'flex';
                descriptionDiv.innerText = description;
            }

            function hideOverlay() {
                overlay.style.display = 'none';
            }

            function showImage(index) {
                const imageLink = imageLinks[index];
                const imageUrl = imageLink.getAttribute('data-image');
                const description = imageLink.getAttribute('data-description');
                showOverlay(imageUrl, description);
                currentImageIndex = index;
            }

            function navigateToImage(index) {
                if (index < 0) {
                    index = imageLinks.length - 1;
                } else if (index >= imageLinks.length) {
                    index = 0;
                }

                showImage(index);
            }

            // Event listeners
            imageLinks.forEach((link, index) => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    showImage(index);
                });
            });

            closeBtn.addEventListener('click', hideOverlay);

            // Arrows navigation
            document.querySelector('.arrow.left').addEventListener('click', () => {
                navigateToImage(currentImageIndex - 1);
            });

            document.querySelector('.arrow.right').addEventListener('click', () => {
                navigateToImage(currentImageIndex + 1);
            });

            window.addEventListener('keydown', (e) => {
                if (overlay.style.display === 'flex') {
                    switch (e.key) {
                        case 'Escape':
                            hideOverlay();
                            break;
                        case 'ArrowLeft':
                            navigateToImage(currentImageIndex - 1);
                            break;
                        case 'ArrowRight':
                            navigateToImage(currentImageIndex + 1);
                            break;
                    }
                }
            });

            window.addEventListener('wheel', (e) => {
                if (overlay.style.display === 'flex') {
                    if (e.deltaY < 0) {
                        navigateToImage(currentImageIndex - 1);
                    } else if (e.deltaY > 0) {
                        navigateToImage(currentImageIndex + 1);
                    }
                }
            });
        });
    </script>
</body>
</html>
				<!-- Testing Image System (Code End) -->

<!-- Body End -->

<?php 
echo siteMap();
echo clickMenuTwo();
echo mainSiteEnd(); ?>