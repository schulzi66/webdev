<?php
        /*  Retrieve date fields from $_POST array and store in PHP variables. */
		if (!empty($_POST['date_of_birth'])) 
		{
		    $birth = $_POST['date_of_birth'];
		}
		else 
		{
		    $birth="";
		}
		if (!empty($_POST['hire_date'])) 
		{
			$hire_date=$_POST['hire_date'];
		}
		else
		{   
		    $hire_date="";
		}
			
			/* Next retrieve non-date form inputs from the $_POST array.
			   Then clean up the data using the htmlspecialchars() function
			   and move the cleaned-up data into PHP variables.
			*/
			if (!empty($_POST['last_name'])) 
			{
			    $last=htmlspecialchars($_POST["last_name"]);
			}
			else
			{
			    $last="";
			}
			if (!empty($_POST['first_name'])) 
			{
			    $first=htmlspecialchars($_POST["first_name"]);
			}
			else
			{
			    $first="";
			}
			
			if (!isset($dont_check_employee_no)) 
			{     // check only if the variable does not exist
                if (!empty($_POST['employee_no'])) 
				 {
			        $employee=htmlspecialchars($_POST["employee_no"]);
				 }
				 else
				 {
				    $employee="";
				 }
			}
			
			if (!empty($_POST['mobile_no'])) 
			{
			    $telephone=htmlspecialchars($_POST["mobile_no"]);
			}
			else
			{
			    $telephone="";
			}
			
			if (!empty($_POST['email'])) 
			{
			    $email=htmlspecialchars($_POST["email"]);
			}
			else
			{
			    $email="";
			}
			
			if (!empty($_POST['gender'])) 
			{
			    $gender=htmlspecialchars($_POST["gender"]);
			}
			else
			{
			    $gender="";
			}
			
			if (!empty($_POST['address'])) 
			{
			    $address=htmlspecialchars($_POST["address"]);
			}
			else
			{
			    $address="";
			}
			
			if (!empty($_POST['salary'])) 
			{
			    $salary=htmlspecialchars($_POST["salary"]);
			}
			else
			{
			    $salary=0;
			}
			
			/* Functions to validate the inputs.
			*/
			
			function ValidateEmail ($input) {
			    /*  One or more letters or digits, followed by "@", followed by
				    one or more letters, digits or a hyphen, followed by ".",
					followed by between 2 and 6 letters at the end.  
					Case insensitive.
				*/
				$emailRegex = '/^[a-z\d\._-]+@([a-z\d-]+\.)+[a-z]{2,6}$/i';

				if (preg_match($emailRegex,$input)) 
				{
					return True;
					
				}
					else 
					{ 
					   echo '<h4>Invalid email address</h4>';
					   echo '<br>';
					   return False;
				}
			}
			
			function ValidatePhoneNumber ($input) {	
			    /* Begin with "+", followed by between 5 and 15 digits.
				*/
				
				$phoneRegex = '/^\+[\d]{5,15}/';

				if (preg_match($phoneRegex,$input)) 
				{
					return True;
					
				}
					else 
					{ 
					   echo '<h4>Invalid telephone number</h4>';
					   echo '<br>';
					   return False;
				}
			}
			
			function ValidateName ($input) {
			    /* Start with a letter.  Allow hypen, apostrophe or space.
				*/
				$nameRegex = '/^[a-z][a-z\-\' ]{2,25}$/i';

				if (preg_match($nameRegex,$input)) 
				{
					return True;
					
				}
					else 
					{ 
					   echo '<h4>Invalid name</h4>';
					   echo '<br>';
					   return False;
				}
			}
			
			function ValidateEmpNo ($input) {
			    /* Must consist of exactly three digits.
				*/
				$empnoRegex = '/^[0-9]{3}$/' ;

				if (preg_match($empnoRegex,$input)) 
				{
					return True;
					
				}
					else 
					{ 
					   echo '<h4>Invalid employee number</h4>';
					   echo '<br>';
					   return False;
				}
			}
			
			function ValidateDate ($input) {
			    /* Ensure that format entered was dd/mm/yyyy
			    */
				$dateRegex ='#^[0-3][0-9]/[0-1][0-9]/[0-9]{4}$#';

				if (preg_match($dateRegex,$input)) 
				{
					return True;
					
				}
					else 
					{ 
					   echo '<h4>Invalid date</h4>';
					   echo '<br>';
					   echo $input;
					   return False;
				}
			}
			
			function ValidateSalary ($input) {
			    /*  Salary must be between 20,000 and 80,000.
			    */

				if ($input >=20000 and $input <= 80000) 
				{
					return True;
					
				}
					else 
					{ 
					   echo '<h4>Invalid salary</h4>';
					   echo '<br>';
					   return False;
				}
			}
		
?>			