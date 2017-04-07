<!doctype html>
<html>

	<head>
		<title>Update Employee</title>
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
        $update=false;
		require 'connect.php';
		
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
                        require "conversion.php";
						
						while($row = mysqli_fetch_array($result)) 
						{
							$first= $row["first_name"];
							$last= $row["last_name"];
							$birth=$row["birth_date"];
							convertDateToHTML($birth);
							$gender=$row["gender"];
							$telephone=  $row["telephone"];
							$email= $row["email"];
							$address= $row["address"];
							$salary= $row["salary"];
							$hire_date= $row["hire_date"];
							convertDateToHTML($hire_date);
						}
						
                     if (isset($_POST['_submit'])) 
						{     //If the submit form was sent
						  
                          $dont_check_employee_no = false; //We don't check because we can't change the number
                          require 'validation.php';
						  
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
						  
						          $request = "UPDATE employee 
                                         SET first_name='$first',
                                         last_name='$last',
                                         birth_date='$birth',
                                         gender='$gender',
                                         telephone='$telephone',
                                         email='$email',
                                         address='$address',
                                         salary='$salary',
                                         hire_date='$hire_date'
                                      WHERE emp_no='$employee'";

                                  $result=mysqli_query($db_connection, $request);
						          if ($result) 
						          {
				
				                     echo "<br>";
				                     echo "<br>";
				                     echo "Thank you! Employee record has been updated.";
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
					              echo 'Problem updating database! ' . mysqli_connect_error();
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
                        }
						else 
						    {
							  $update= true;
                              require 'update_emp_form.php';
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
				
        } else 
			  {
			    echo "<br>";
				echo " You have entered an invalid employee id. ";
				echo "<br>";
				echo "<br>";
				echo "<br>";
              }
		?>
	<?php if (!$update)
	      {
	
	        echo "<form action='update_employee.html'>
		       <br>
		       <br>
		       <left><button class='update_employee' type='submit' />Update another employee record</button>
	           </form>";
	      }
	?>

	</body>

</html>
