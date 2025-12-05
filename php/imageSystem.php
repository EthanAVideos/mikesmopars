<?php
function load77d300Imgs() {
    $php = <<<EOT
<?php
$image_folder = "..content/images/imageSystem/77-d300/";
$images = glob($image_folder. "*.{JPG,jpg,jpeg}", GLOB_BRACE);
?>
<?php foreach ($images as $image):?>
    <a href="#" class="image-link" data-image="<?php echo $image;?>">
        <img class="test" src="<?php echo $image;?>" alt="If this text is seen, an image failed to load." width="150" height="80" />
    </a>
<?php endforeach;?>
EOT;

    return $php;
}


#Overlays
function overlay() {
	$html = '
	<div id="overlay">
		<span class="close-button">&times;</span>
		<div class="arrow left" onclick="navigateToImage(currentImageIndex - 1)">&#8249;</div>
		<div class="arrow right" onclick="navigateToImage(currentImageIndex + 1)">&#8250;</div>
		<img id="overlay-image" src="" alt="Full-screen Image" />
		<div class="instruction-text">
			Use left & right arrow keys or mouse scroll up & down to change images.
		</div>
	</div>';
	
	return $html;
}

# Slidshow UI Func. JS
function imgUIfunction() {
	$jsCode =<<<EOF
<script type="text/javascript">
window.addEventListener('DOMContentLoaded', () => {
			const overlay = document.getElementById('overlay');
			const overlayImage = document.getElementById('overlay-image');
			const closeBtn = document.querySelector('.close-button');
			const imageLinks = document.querySelectorAll('.image-link');
			let currentImageIndex = 0;

			function showOverlay(imageUrl) {
				overlayImage.src = imageUrl;
				overlay.style.display = 'flex';
			}

			function hideOverlay() {
				overlay.style.display = 'none';
			}

			function showImage(index) {
				const imageLink = imageLinks[index];
				const imageUrl = imageLink.getAttribute('data-image');
				showOverlay(imageUrl);
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
EOF;

	return $jsCode;
}

#Templates

		/*
		<?php
  			   		$image_folder = "content/images/imageSystem/";
 			   		$images = glob($image_folder . "*.{JPG,jpg,heic}", GLOB_BRACE);

  					foreach ($images as $image) {
    				$imageFileName = basename($image);
    	  			echo "<a href='" . $image . "' target='_blank' title='Click me to view full screen'>";
    				echo "<img src='" . $image . "' alt='If this text is seen a image failed to load.' width='150' height='80' />";
    				echo "</a>
    			?>";
 					 }
				#  Dont for get the php ending tag!
			 */
?>