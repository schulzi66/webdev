<!doctype html>
<html>

	<head>
		<title>Delete Employee</title>
		<meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" type="text/css" href="employee_form.css">
		<style type="text/css"> 
		 html{
			background-color: #d53e4f;
			}
		</style>
	</head>

	<body>
		<a href="index.html">Home</a>

		<?php

			require("connect.php");
			
			$employee=htmlspecialchars($_POST["employee_no"]);
			
			echo "<br/>";
			
			$numberRegex = '/^[0-9]{3}$/' ;
			if (preg_match($numberRegex,$employee))
			{
			
				$sql = "DELETE FROM employee 
					    WHERE emp_no = '$employee' ";
			  
				$result = mysqli_query($db_connection, $sql);
				
				if ($result)
				{
				   if (mysqli_affected_rows($db_connection) > 0)
				   {
				      echo " Employee number $employee has been successfully deleted.";
				      echo "<br>";
				      echo "<br>";
				   }
				   else
				   {
				      /*    Zero rows were returned from the database.
					  */
				      echo "Employee number $employee was not found.";
					  echo "<br>";
				      echo "<br>";
				   }
				}
				else
				{
				       echo "<br>";
					   echo 'Problem deleting from database! ' . mysqli_connect_error();
					   echo "<br>";
				}
			}
			else 
			{
					echo "<br>";
					echo " You have entered an invalid employee id. ";
					echo "<br>";
					echo "<br>";
					echo "<br>";
			}

		?>
		<a href="delete_employee.html">Delete another employee</a>

	</body>

</html>
