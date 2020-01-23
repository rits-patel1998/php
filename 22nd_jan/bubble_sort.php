<?php
// Write a Program for Bubble sorting in PHP



$numbers = [100,5,200,65,30];
print_r($numbers);

for ($i=0; $i < sizeof($numbers); $i++) { 
    for ($j = $i+1; $j < sizeof($numbers); $j++) { 
        if ($numbers[$i] < $numbers[$j]) {
            $tmp = $numbers[$i];
            $numbers[$i] = $numbers[$j];
            $numbers[$j] = $tmp;
        }
    }
}
echo "<br>";
print_r($numbers);

?>