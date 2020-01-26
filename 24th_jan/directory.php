<?php

    $path ='file';
    

    if ($arrPath = opendir($path.'/')) {
        while ($files = readdir($arrPath)) {
            echo '<a href="'.$path .'/'.$files.'">'. $files."<br>";
            // echo '<a href="'.$path .'/'..'">'
        }
    }
    $fileName = 'file/abcd.txt';
    if (file_exists($fileName)) {
        $rand = rand(1000,10012);
        rename($fileName,$rand.'.txt');
    }
    else{
        echo "You have to create first";
    }

    
?>