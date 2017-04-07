<nav>
	<?php
	$sql = "SELECT * FROM pages1";
	$result = $conn->query($sql);	
    while($row = $result->fetch_assoc()) 
    	echo '<a href="index.php?page='.$row["page"].'">'.ucfirst($row["page"]).'</a><br/>';
    ?>

	<a href="index.php?page=404">404</a>	
</nav>