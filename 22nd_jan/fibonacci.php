<?php

    $num1 = 0;
    $num2 = 1;
    $sum=0;
    echo "$num1<br>";
    echo "$num2<br>";
    
    while($sum <= 10){
        $sum = $num1 + $num2;
        echo $sum.'<br>';
        $num1 = $num2;
        $num2 = $sum;

    }
?>