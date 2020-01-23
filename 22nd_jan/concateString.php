<?php

    $str1 = "ritu";
    $str2 = "Smith";
    echo "$str1";
    echo "$str2<br>";
      for ($i = 0 && ; $i < strlen($str2) || $j < strlen($str2); $i++) { 
            // echo "$str1[$i] $str2[$i] ";

            if (strlen($str2) > strlen($str1)) {
                echo "$str1[$i] $str2[$j]";
                echo "$str2[$j]";
            }
            else{
                echo "$str1[$i] $str2[$j]";
                echo "$str2[$i]";
            }
        }
    

?>