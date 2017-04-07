<?php
	
		$hostname = 'localhost';
		$username = 'root';
		$password = 'SQLroot';
		$database = 'classexamples';

		$connection = mysqli_connect($hostname, $username, $password, $database);
		
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}

		$query = "SELECT * FROM studentdetails WHERE firstname='" . $_POST['firstname'] 
				. "' AND surname = '" .($_POST['surname']) . "'";
		//echo $query;
		$result = mysqli_query($connection, $query) or die();
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["surname"]. "<br>";
			}
	}
		else {
			echo 'NO RESULTS';	
		}
		
	// CLOSE CONNECTION
		mysqli_close($connection);
	
?>