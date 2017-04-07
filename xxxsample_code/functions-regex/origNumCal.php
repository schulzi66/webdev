<?php
$origNum = 10;
$origNum2 = 11;

  function manipulate ($origNum, $origNum2) {
     $origNum2 = $origNum2 - $origNum;
	 
	 echo $origNum2;
  }
  
  manipulate($origNum, $origNum2);
  
  echo "<br>";
  echo $origNum;
  echo "<br>";
  echo $origNum2;
?>