<?php

$stuff = array();
$stuff["A"] = "Hello!!";
echo $stuff["A"];
echo "<br>";
print_r($stuff);
echo "<br>";
var_dump($stuff);
$stuff["Beta"]=" world";
echo "<br>";
echo $stuff["Beta"];
echo "<br>";
print_r($stuff);
echo "<br>";
$county = array("C"=>"Cork",
                "T"=>"Tipperary",
				"L"=>"Limerick City",
				"Lk"=>"Limerick County",
				"D"=>"Dublin");
echo $county["Lk"]."<br>";
echo $county["D"]."<br>";

foreach ($county as $key=>$val) {
     if ($key!="D") {
          echo "Key: ". $key . " , ". "County: ". $val . "<br>";
		}
	 
	 };
echo "<br>";
var_dump($county);
?>