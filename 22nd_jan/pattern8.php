<?php

// *0
// ***00
// ******000
// **********0000
// ***************00000
    $cnt = 1;
    $str = '';
    for ($row = 1; $row <= 5; $row++) { 

        for ($col = 1; $col <= $row; $col++) { 
            // echo "*";
            $str .= "*";
            
        }
        echo $str;
        for ($i = 1; $i <= $row; $i++) { 
            echo "0";
        }
        // echo"$col";
        echo "<br>";

    }

?>