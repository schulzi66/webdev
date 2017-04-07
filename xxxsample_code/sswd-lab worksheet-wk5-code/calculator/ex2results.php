<html>
   <head> <title>Add Two Numbers </title>
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
          $no1 = $_POST["num1"];
		  $no2 = $_POST["num2"];
        } else {
         $no1 = 0;
		 $no2 = 0;
        }
	      
		   function add($no1, $no2) {
		      return $result = $no1 + $no2;
			  }
			  
			  
			  $sum = add($no1, $no2);
			  echo "<br><h1>The result of adding $no1 and $no2 is $sum </h1><br><br><br> ";
	   ?>
	       <a href="calculate.php">Play again</a>
           
    </body>
   
   </head>

</html>