<?php

    $num1 = 24;
    $num2 = 0;
    $arrNum1 = [];
    
    $arrNum2 = [];
    for ($i = 1; $i <= $num1; $i++) { 
        if ($num1 % $i == 0) {
           array_push( $arrNum1,$i);
        }
    }
    print_r( $arrNum1);

    echo "<br>";

    for ($i = 1; $i <= $num2; $i++) { 
        if ($num2 % $i == 0) {
            array_push( $arrNum2,$i);
        }
    }
    print_r( $arrNum2);

    $arrNum3 = [];
    for ($i = 0; $i < sizeof($arrNum1); $i++) { 
       for ($j = 0; $j < sizeof($arrNum2); $j++) { 
            if ($arrNum1[$i] == $arrNum2[$j]) {
                // echo 
                array_push($arrNum3 , $arrNum1[$i]);
            }
       }
    }
    echo max($arrNum3);
?>