<?php
	// 1. First thing we do is set a cookie 
	// (before any information is sent from the script)
	
	if(!isset($_COOKIE["colours"])){
		setcookie("colours", "red", time()+6000);
		
		echo 'Colour preference set! Next time you load the page you should see your preference!<br/>';
	}
?>

<html>
	<head><title>Hmmmmmm, COOKIES!</title></head>

	<body>
		<font size="5"
			<?php
				if(isset($_COOKIE["colours"])){
					echo "color='" . $_COOKIE["colours"] . "'";
				}
			?>
			>My favourite colour!</font>
	</body>
</html>