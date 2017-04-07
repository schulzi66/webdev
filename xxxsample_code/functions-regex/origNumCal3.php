<?php
$origNum = 10;
$origNum2 = 11;

  function manipulate ($a, &$b) {
	 $a = $b + $a - $b;
	 return $b - $a;
  }
  
  manipulate($origNum, $origNum2);
  
  echo "<br>";
  echo $origNum;
  echo "<br>";
  echo $origNum2;
?>