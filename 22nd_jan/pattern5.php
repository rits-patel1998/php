<?php

    for ($i = 1; $i <= 4; $i++) { 
        for ($j = $i; $j <= $i+8; $j+=4) { 
            echo $j." ";
        }
        echo " <br>";
    }

?>