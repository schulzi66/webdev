<!doctype html>
<html>

	<head>
		<title>Search Employee</title>
		<meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" type="text/css" href="employee_form.css">
	</head>
	<style type="text/css"> 
		 html{
			background-color: #d53e4f;
			}
		</style>

	<body>
		<a href="index.html">Home</a>

		<?php

			require("connect.php");
			
			$employee=htmlspecialchars($_POST["employee_no"]);
			$numberRegex = '/^[0-9]{3}$/' ;
			
			if (preg_match($numberRegex,$employee))
			{
				$sql = "SELECT first_name, last_name, emp_no, birth_date, gender, telephone, email, address, salary, hire_date  FROM employee  WHERE emp_no = '$employee'";
			
					$result = mysqli_query($db_connection, $sql);
					
					if ($result) 
					{
					    if (mysqli_num_rows($result) > 0) 
						{
						    echo "<br/>";
						    while($row = mysqli_fetch_array($result)) 
							{
								echo "<h4>Employee  $employee </h4>";
								echo "First Name : " . $row["first_name"]. " <br/> " . "Last Name : " . $row["last_name"] . " <br/> " . "Employee Number : " . $row["emp_no"];
								echo " <br/> " . "Date of Birth : " . $row["birth_date"]. " <br/> " . "Gender : " . $row["gender"]. " <br/> " . "Telephone : " . $row["telephone"];
								echo " <br/> " . "Email : " . $row["email"]. " <br/> " . "Address : " . $row["address"]. " <br/> " . "Salary : " . $row["salary"] . " <br/> " . "Hire Date : " . $row["hire_date"];
								echo "<br/>";
							}
						 }
						else
						 {
						   echo "<br/>";
						   echo "Employee ID does not exist in the database!";
						 }
						
					} 
					else 
					{
						mysqli_close($db_connection); 
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
	<form action="search_employee.html">
		<br>
		<br>
		<left><button class="search_employee" type="submit" />Do another search</button>
	</form>


	</body>

</html>
