<?php

// 1
// 23
// 456
// 78910
// 1112131415


    $cnt = 0;
    for ($row = 0; $row < 5; $row++) { 
        for ($col = 0; $col <= $row; $col++) { 
            $cnt++;
            echo "$cnt";
           
        }
        echo "<br>";
    }

?>