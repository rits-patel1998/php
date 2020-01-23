<?php
// Write a Program to swap two numbers in PHP.



    $a = 5;
    $b = 3;
    echo "a is $a<br>";
    echo "b is $b<br>";
    
    $a = $a + $b;
    $b = $a - $b;
    $a = $a - $b;

    echo "After swaping : <br>";
    echo "a is $a<br>";
    echo "b is $b";
?>