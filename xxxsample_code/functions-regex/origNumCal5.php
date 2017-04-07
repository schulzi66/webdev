<?php
$origNum = 10;
$origNum2 = 11;

  function manipulate (&$a, &$b) {
	 $a = $b + $a - $b;
	 $b = $b-$a;
	 return;
  }
  
  manipulate($origNum, $origNum2);
  
  echo "<br>";
  echo $origNum;
  echo "<br>";
  echo $origNum2;
?>