<?php

    $name="Rits Patel";
	echo strrev($name).'<br>';
    echo substr($name, 2,6);
    echo addcslashes($name,"tr");
    echo"<br>";


    $str="Hello frnds.. / This is Ritu Patel .";	
	$cnt=str_word_count($str,2,'./');
    print_r($cnt);
    echo"<br>";


    echo str_shuffle($str);
    echo"<br>";
?>

