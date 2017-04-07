<?php
$myString="PHP is a really cool programming language!";
$result = substr($myString, 9, 4);
echo $result;
echo "</br>";
$result2 = strpos($myString, "al");
echo $result2;
echo "</br>";
$words = str_word_count($myString);
echo "</br>";
echo $words;
?>