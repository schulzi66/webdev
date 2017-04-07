<?php
$testvariable = 'First';
function test() {
    global $testvariable;
    //$testvariable= "this is a test variable <br/>";
	echo "test variable is " . $testvariable . "<br/>";
  }
  
  echo "test variable is " . $testvariable. "<br>";
  test();
?>