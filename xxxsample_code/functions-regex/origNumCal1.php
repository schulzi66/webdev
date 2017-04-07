<?php
$origNum = 10;
$origNum2 = 11;

  function manipulate ($a, &$b) {
     // $origNum2 = $origNum2 + $origNum2 - $origNum
	 
	 echo $b = $b - $a;
  }
  
  manipulate($origNum, $origNum2);
  
  echo "<br>";
  echo $origNum;
  echo "<br>";
  echo $origNum2;
?>