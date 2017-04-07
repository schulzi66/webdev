<?php
echo "Boo";
?>
<hr/>

 <?php
for ($i=0 ; $i<5 ; $i++)
    echo "Boo, ".$i."<br/>";
?> 
<hr/>

<?php
$x = 5;
if ($x==4)
    echo "x is 4";
else
    echo "x is NOT 4";
?> 
<hr/>

<?php
function println($str) {
    echo $str."<br/>";
}

println('hello');
println('world');
?> 