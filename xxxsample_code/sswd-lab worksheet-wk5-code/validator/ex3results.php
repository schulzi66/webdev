<html>
   <head> <title>Validate Name </title>
   <style>
    body {
        text-align: center;
        margin-left: auto;
        margin-right: auto;
    }
   </style>
   <body>
       <?php
	    // Access variables that have been set via POST
		
	   if(isset($_POST["submit"])){
          $firstName = $_POST["firstName"];
		  $initial = $_POST["initial"];
		  $surName = $_POST["surName"];
        } else {
         $firstName = '';
		 $initial = '';
		 $surName = '';
        }
	      
		   function validate($firstName, $initial, $surName) {
		       global $message;
		      // if (strlen($firstName) < 3 || (!($firstName[0] >= "A" && $firstName[0] <= "Z"))) {
			   if (strlen($firstName) < 3 || !ctype_upper(substr($firstName, 0,1))) {
			       $message .= "You have entered an invalid first name: must start with an upper case letter and 
				                  must be a least 3 characters long <br/>"; 
			   }
			   
			   if (strlen($initial) !=1) {
			        $message .= "You have entered an invalid middle initial: must be 1 character long <br/>"; 
			   }
			   
			   if (strlen($surName) < 4 || !ctype_upper(substr($surName,0,1))) {
			       $message .= "You have entered an invalid surname: must start with an upper case letter and 
				                    must be a least 4 characters long <br/>"; 
			   }
	          return $message;
			  }
			  
			  
			  $result = validate($firstName, $initial, $surName);
			  if (empty($result)){
			      echo "<p style='color:blue;'>The information you entered was valid <br /></p>";
				  }
			  else 
			      {
				    echo "<p style='color:red;'> $message </p>";
					}
					
			  echo "<br><br><br>";
	   ?>
	       <a href="validate.php">Play again</a>
           
    </body>
   
   </head>

</html>