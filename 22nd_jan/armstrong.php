<?php
    $onum = 153;
     $num = $onum;
    $rnum = 0;
    while ($num > 0) {
        $rem = $num % 10;
        $num = (int)($num / 10);
        $rnum =  $rnum  +  ($rem * $rem* $rem);
    }
    // echo  $rnum;
    
    if ($onum == $rnum) {
        echo "$onum is armstrong";
    }
   
?>