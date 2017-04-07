<!DOCTYPE html>
<html>

<head>
<TITLE>Predefined Variables</TITLE>
</head>

<body>
<?php # Script 1.6 - strings.php

// Create the variables
//$first_name = 'Charles';
//$last_name = 'Dickens';
//$book = 'Great Expectations';

// Print the values:
//echo "<p>The book <em>$book</em>
//was written by $first_name
//$last_name.</p>";

$city = 'Dublin';
$country = 'ireland';
$postcode = 1200;
$address = $city . ' '. $postcode .', '.$country;
echo $address. "<br >";
echo $address . "<br >";
$num=strlen($address);
echo "The string is <em>$num</em> characters long <br >";
$upper= ucwords($address);
echo $upper . "<br>";

$address = "'$city, $country'";
echo $address;
echo "<br>";
$num=strlen($address);
$str="The string is <b>$num</b> characters long <br >";
echo $str;
$upper2 = strtoupper($str);
echo $upper2;
echo "<br>";
$pos = strpos($address, "Ire");
if($pos===false) {
   echo "The substring was not found!";
}
else {
   echo "The substring was found at position $pos";
   }
echo "<br>";
$pos = strpos($upper, "Ire");
if($pos===false) {
   echo "The substring was not found!";
}
else {
   echo "The substring was found at position $pos";
   }
?>
</body>

</html>