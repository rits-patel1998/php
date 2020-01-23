<?php

    $num1 = 10;
    $num2 = 15;
    $arrNum1 = [];
    for ($i = 1; $i < 10; $i++) { 
        echo (int)($i*$num1);
        array_push( $arrNum1,(int)($i*$num1));
    }
    print_r($arrNum1);
    echo"<br>";
    $arrNum2=[];
    for ($i = 1; $i < 10; $i++) { 
        echo (int)($i*$num2);
        array_push( $arrNum2,(int)($i*$num2));
    }
    print_r($arrNum2);

    $result = array_intersect($arrNum1, $arrNum2);
    print_r($result);
    echo"Least comman factors : $result[2]";
?>