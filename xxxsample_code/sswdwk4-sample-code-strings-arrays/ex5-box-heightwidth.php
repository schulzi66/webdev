<?php

/*     Box Height & Width */
      
	   
$boxHeight=5;        
$boxWidth=10;  
  for ($i=1; $i<=$boxHeight; $i++) {
              for ($j=1; $j<=$boxWidth; $j++) {
			      if (($i==1) || ($i == $boxHeight)) {  // 1st or last row
				     echo "*";
					 }
				     elseif (($j==1) || ($j==$boxWidth)) {  // 1st or last column
				       echo "*";
				     }
					 else {
					    echo "&nbsp";  // HTML non-breaking space
						}
			   }
			   echo "</br>";
			   }
           
?>