<!DOCTYPE html>
<html lang="en">
	<head>
		<title>HDC-SEWA</title>		
	</head>
	
	<body>
		<h1>Parameters</h1>

		<p>Reading data entered by the user</p> 

		<form action="parameters.php" method="get">
			<label for="number">Please enter a number</label>
			<input type="text" name="number" value=""/>
			<input type="submit" value="Go"/>
		</form>

		<?php 
		if (isset($_GET['number'])) {
		    $number = $_GET['number'];
			}
		else 
		    { $number = null; }

		if ($number!=null && is_numeric($number)) {
			echo '<p>That is a nice number, '.$number.'</p>';
		}
		?>

	</body>
</html>
