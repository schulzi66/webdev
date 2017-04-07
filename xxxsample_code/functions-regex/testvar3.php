<?php

function say_hello($a,$b) {
    echo $a;
	echo "<br>";
	echo $b;
	$a = $a.$b;
    echo $a; 
	return $a;
	}
	
	$x = "Hi ";
	$y = "there!";
	$concat= say_hello($x, $y);
	echo $concat;
	
	?>