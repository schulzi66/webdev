<?php

// Problem 1
/*     2*5-6  /  4*8-2*3
       ((2*5) - 6) / ((4*8) - (2*3))  */
	   
$i=2; $j=5; $k=6;               // top line
$a=4; $b=8; $c=2; $d=3;         // bottom line

$top = (($i*$j) - $k);
$bottom = (($a*$b) - ($c*$d));

// $result = (($i*$j) - $k) / (($a*$b) - ($c*$d));

if ($bottom <=0) {            // display error message if div by 0
   echo "Error - division by zero in first problem";
   }
   else {
      $result = $top / $bottom;
	  echo "The first result is $result </br>";
	  }


// Problem 2
/*  34/5*67-8*9 / 4*3-2*6
    ((34/5)*67-(8*9)) / (4*3)-(2*6)  */
	
$t=34; $u=5; $v=67; $w=8; $x=9;    // top line
$y=4; $z=3; $m=2; $n=6;            // bottom line

$bottom = ($y*$z)-($m*$n);
$top = (($t/$u)*$v-($w*$x));

if ($bottom <=0) {            // display error message if div by 0
   echo "Error - division by zero in second problem";
   }
   else {
      $result = $top / $bottom;
	  echo "The second result is $result </br>";
	  }
?>