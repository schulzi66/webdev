<?php
   $a = 1;
   $b = 2.5;
   $c = 0xFF;
   echo "c = $c <br/>";
    $d = $b + $c;
    $e = $d * $b;
    $f = ($d + $e) % $a;
    print ($f + $e);
?>