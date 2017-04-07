<?php
       $value = "Hello";
	   setcookie("MyCookie", $value, time()+3600*24);
	   setcookie("AnotherCookie", $value, time()+3600);
	   setcookie("YetAnotherCookie", $value, time()+60);
	   
	   
	   foreach ($_COOKIE as $key=>$val) {
	      print $key . "=>" . $val . "<br/>";
		  }
		  
?>