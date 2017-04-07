<?php

$names = "Charlie, Sarah, Bert, Alex, Julie, Sasha, Olive, Betty, Max";


$nameArray = explode(", ", $names);
var_dump($nameArray);
echo "<br>";

echo "<table>";
foreach ($nameArray as $element) {
    echo "<tr>";
	   echo "<td>";
          echo $element;
	      echo "</br>";
	   echo "</td>";
	echo "</tr>";
}
echo "</table>";


?>