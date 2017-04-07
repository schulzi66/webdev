<!doctype html>
<html>

	<head>
		<title>Add Employee</title>
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
			require("validation.php");
			require("conversion.php");
			
			if ((validateName($last)) and
			    (validateName($first)) and
			    (validateEmpNo($employee)) and
			    (validatePhoneNumber($telephone)) and
			    (validateEmail($email)) and 
			    (validateDate($birth)) and
			    (validateSalary($salary)) and
			    (validateDate($hire_date)))
			    {
				    convertDateToSQL($birth);
					convertDateToSQL($hire_date);
					
					/* Insert data and attribute names into two arrays so that 
					   they can be displayed to the user after successful insertion
					   to the database.
					*/
					$list=array( $last, $first, $employee, $address, $telephone, $email, $birth, $gender, $salary, $hire_date);
				    $info=array( "Last Name", "First Name", "Employee Number","Address","Telephone", "Email", "Date of Birth", "Gender", "Salary", "Hire Date" );
				    
					/*  Inputs are all valid.
					    Prepare the data to be written to the MySQL database.
					    Escape special characters in each string before use in
						an SQL statement.
					*/
				    $last=mysqli_real_escape_string($db_connection, $last);
					$first=mysqli_real_escape_string($db_connection, $first);
					$employee=mysqli_real_escape_string($db_connection, $employee);
					$telephone=mysqli_real_escape_string($db_connection, $telephone);
					$email=mysqli_real_escape_string($db_connection, $email);
					$birth=mysqli_real_escape_string($db_connection, $birth);
					$hire_date=mysqli_real_escape_string($db_connection, $hire_date);
					
				    $sql = "INSERT INTO employee (first_name, last_name, emp_no, birth_date, gender, telephone, email, address, salary, hire_date)
				            VALUES ('$first','$last', '$employee', '$birth', '$gender', '$telephone', '$email', '$address', '$salary', '$hire_date')";
				
				    $result = mysqli_query($db_connection, $sql);
					
					if ($result) {
				
				       echo "<br>";
				       echo "<br>";
				       echo "Thank you! Entry has been inserted into the database.";
				       echo "<br>";
				       echo "<br>";
			
				       for ($i=0; $i < count($list);$i++)
				       {
					       echo "$info[$i] : $list[$i]";
					       echo "<br>";
					       echo "<br>";
					
				       }
			        }
					else
					 {
					   echo "<br>";
					   echo 'Problem inserting to database! ' . mysqli_connect_error();
					   echo "<br>";
					 }
				}
			else 
			{
		        echo " Your information is incomplete or incorrect. ";
				echo "<br>";
				echo "<br>";
				echo "<br>";
			}			  	  
		?>
		<a href="add_employee.html">Add another employee record</a>

	</body>

</html>
