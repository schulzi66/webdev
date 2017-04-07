<?php
$origNum = 10;
$origNum2 = 11;

  function manipulate ($a, &$b) {
	 $a = $b + $a - $b + 3;
	 return $b - $a;
  }
  
  $r= manipulate($origNum, $origNum2);
  
  echo "<br>";
  echo $origNum;
  echo "<br>";
  echo $origNum2;
  echo "<br>";
  echo $r;
?>