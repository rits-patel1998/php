<?php
// Write a Program for finding the biggest number in an array without using any array functions.


$numbers = [100,5,200,65,30];

for ($i=0; $i < sizeof($numbers); $i++) { 
    for ($j = $i+1; $j < sizeof($numbers); $j++) { 
        if ($numbers[$i] < $numbers[$j]) {
            $tmp = $numbers[$i];
            $numbers[$i] = $numbers[$j];
            $numbers[$j] = $tmp;
        }
    }
}
print_r($numbers);
echo"<br>Biggest no is: $numbers[0]";
?>