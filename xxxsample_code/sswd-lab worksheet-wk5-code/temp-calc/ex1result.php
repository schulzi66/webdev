<html>
   <head> <title>Convert Degrees Celsius to Farenheit </title>
   
   <body>
       <?php
	    // Access variable that has been set via GET
		
	   if(isset($_GET["submit"])){
          $c = $_GET["cel"];
        } else {
         $c = 0;
        }
	      
		   function cToF($c) {
		       /*     Celsius to Fahrenheit
					  Multiply by 9/5 and add 32    */
		      return $f = ($c * (9/5)) + 32;
			  }
			  
			  
			  $answer = cToF($c);
			  echo "<br><h1 style='text-align:center'>$c degrees Celcius in Farenheit is $answer </h1><br><br><br> ";
	   ?>
	       <a href="convert.php">Play again</a>
           
    </body>
   
   </head>

</html>