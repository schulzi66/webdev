<!DOCTYPE html>
<html>

<head>
<TITLE>Loops </TITLE>
</head>

<body>
<?php # Worksheet 1 exercise 1
/* Echo all the even numbers between 0 and 100 (inclusive
   but not the numbers that are exactly divisible by 10 */
   echo "Using For Loop </br>";
    for ($i=0; $i<100; $i++) {
     if ($i%2==0) {                 // test if number is even
	       if ($i%10!==0) {         // test if divisible by 10
	         echo $i;
			 echo '</br>';
      } 
	  }
      }
	 

echo "Using While Loop </br>";
$i = 0;
while ($i <= 100):
    if ($i%2==0) {
	   if ($i%10!==0) {
           echo $i;
	       echo '</br>';
		}
	 }
    $i++;
endwhile;

echo "Using Do..While Loop <br>";
$i = 0;
do {
    if ($i%2==0) {         // test whether no. is even
	   if ($i%10!==0) {    // test whether divisible by 10
          echo $i;
		  echo '</br>';
		}
	}
	$i++;
} while ($i <=100);

?>
</body>

</html>