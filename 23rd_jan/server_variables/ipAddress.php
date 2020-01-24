<?php

    $ipAddress = $_SERVER['REMOTE_ADDR'];
    // echo $ipAddress;
    $blocked =['::1','124.100.100.1'];
   
    foreach ($blocked as $ip) {
        if ($ip == $ipAddress) {
            echo "Your ip address $ipAddress is blocked";
        }     
    }
?>