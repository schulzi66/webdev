<?php
session_start();
include("inc/head.php");
include("inc/header.php");
include("db/config.php");
$page = "contact";


$sql = "SELECT * FROM images WHERE page='contact'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	echo '</br> </br>';
	echo '<image src="images/'.$row["name"].'">';
	echo '<p>'.$row["description"].'</p>';
}



$sql = "SELECT * FROM pages WHERE page='contact'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo '<h1>'.$row["title"].'</h1>';
			echo $row["text"];
		}
	}
	
	
	if (isset($_SESSION['username'])) 
{
	echo '<p><a href="edit.php?page=contact">Edit this page</a></p>';
	
}

?>










<section>
		
	<form method="post" action="controller.php?add=comment" class="form">

		<label for="name">Name :</label><br/>
		<input type="text" name="name" id="name" placeholder="Ex : FERRERO Pietro  " size="20" maxlength="20" required /><br/>
	
		<label for="E-mail">E-mail :</label><br/>
		<input type="email" name="email" id="email" size="30" placeholder="Ex : pietro.ferrero@gmail.com" required /><br/>
	
		<label for="message">Message :</label><br/>
		<textarea name="message"></textarea><br/> <br/>
		
		<label for="star">Stars :</label></br>
		<image src="graphics/star.jpg" alt="star"><input type="radio" value="1" name="star" id="star"/><br/>
		<image src="graphics/star.jpg" alt="star"><image src="graphics/star.jpg" alt="star"><input type="radio" value="2" name="star" id="star"/><br/>
		<image src="graphics/star.jpg" alt="star"><image src="graphics/star.jpg" alt="star"><image src="graphics/star.jpg" alt="star"><input type="radio" value="3" name="star" id="star"/><br/>
		<image src="graphics/star.jpg" alt="star"><image src="graphics/star.jpg" alt="star"><image src="graphics/star.jpg" alt="star"><image src="graphics/star.jpg" alt="star"><input type="radio" value="4" name="star" id="star"/><br/>
		<image src="graphics/star.jpg" alt="star"><image src="graphics/star.jpg" alt="star"><image src="graphics/star.jpg" alt="star"><image src="graphics/star.jpg" alt="star"><image src="graphics/star.jpg" alt="star"><input type="radio" value="5" name="star" id="star"/><br/>
		
		</br>
	
		<input type="submit" value="Submit" id="bouton"/>
				
	</form>
		
</section>



<?php





include("inc/footer.php");
?>