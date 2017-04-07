<html>
   <head> <title>Week 5 </title>
   
   <body>
       <?php
	       // Access variables that have been set via GET
	       $num1 = $_GET["num1"];
		   $num2 = $_GET["num2"];
		   
		   function addNumbers($num1, $num2) {
		      return $num1 + $num2;
			  }
			  
			  // $answer = addNumbers($_GET["num1], $_GET["num2]);
			  $answer = addNumbers($num1, $num2);
			  echo "Your numbers, added, are: " . $answer;
	   ?>
   
    </body>
   
   </head>

</html>