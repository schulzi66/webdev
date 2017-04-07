<html>
   <head> <title>Week 5 </title>
   
   <body>
       <?php
	     
	       $num1 = 1;
		   
		   function reduceBy1($a) {
		      return $a  = $a-1; 
			  }
			  
			  echo "Num1 before call: " . $num1 . "<br><br>";
			  echo reduceBy1($num1);
			  $r = reduceBy1($num1);
			  echo "result = $r <br>";
			  echo "Num1 after call: " . $num1 . "<br><br>";
	   ?>
   
    </body>
   
   </head>

</html>