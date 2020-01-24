<?php

    $clientIp = $_SERVER['HTTP_CLIENT_IP'];
    $https_forward = $_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote = $_SERVER['REMOTE_ADDR'];

    if (!empty($clientIp)) {
        $ipAddress = $clientIp;
    }
    else if (!empty($https_forward)) {
        $ipAddress = $https_forward;
    }
    else{
        $ipAddress = $remote;
    }

?>