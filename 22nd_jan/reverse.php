<?php
    
    $num = 12345;
    echo "Original no : $num<br>";
    $rnum = 0;
    while ($num > 0) {
        $rem = $num % 10;
        $num = (int)($num / 10);
        $rnum =  $rnum  * 10 +$rem;
    }
    
    echo  " Reverse No : $rnum" ;
    
   
   
?>