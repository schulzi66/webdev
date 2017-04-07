<?php
include('inc/header.php');
include('inc/nav.php');

$images = glob("./images/*.{jpg,jpe,jpeg,png,gif}", GLOB_BRACE);
?>

<main data-images="<?php echo count($images); ?>">

	<h1>Uploading / Displaying Images</h1>
	<form action="controller.php" enctype="multipart/form-data" method="post">
		<label for="image-ip">Choose An Image</label>
		<input id="image-ip" type="file" name="image"/>
		<input type="submit" value="Upload"/>
	</form>

	<hr/>
	<h3>Contents of directory: <?php echo __DIR__; ?>/images</h3>


	<?php
	
	if (count($images)==0)
		echo "<p>No images found</p>";

	else {
		echo '<p id="count">Image count: <span></span></p>';
		echo '<ul>';
		foreach ($images as $img) {
			echo '<li>
					<img src="'.$img.'"/>
					<span>'.basename($img).'</span>
					</li>';
		}
		echo '</ul>';
	}
	?>
</main>

<?php
include('inc/footer.php');
?>