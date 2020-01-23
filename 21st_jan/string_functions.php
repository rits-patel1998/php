<?php

    $str = "string";
    echo 'getting single charcaters : ';
    for ($i = 0; $i < strlen($str); $i++) { 
        echo substr( $str, $i,1).'<br>';
    }
    echo"<br><br><br>";
    

    echo "length of null : ".strlen(null)."<br>";
    echo "length of false : ".strlen(false)."<br>";
    echo "length of true : ".strlen(TRUE)."<br>";
    echo "length of null : ".mb_strlen(123)."<br>";

    $var = "મુંબઈ સમાચાર";
    echo "Use of mb_strlen : ".mb_strlen($var)."<br>";
    echo strlen($var)."<br>";

    // $arr=[10,20,30];
    // strlen


    echo "<strong>counting no. of characters in a string : </strong><br>This is Ritu Patel<br>";
	foreach (count_chars("This is Ritu Patel",1) as $key => $value) {
		echo chr($key) .'=>'. $value.'<br>';
	}
    echo "<br><br>";
    
    
    print_r(count_chars('kunjan!',1));
    echo "<br><br>";
    

    print_r(count_chars('kunjbarotan!',3));
    echo "<br><br>";
    
    // echo (count_chars('kunjbarotan!',2));
    

    $str = 'This is Ritu patel.. And this is me.';
	// $find='is';
	$offset=0;
    echo "$str";
	// echo strpos($str, $find, $offset);
	while ($strposition=strpos($str, ' is ', $offset)) {
		
        echo "is found at $strposition <br>";
        $offset= $strposition + strlen(' is ');
        
    }

    echo str_replace(' is ',' are ',$str);
    $new = str_replace("ritu patel",'are',2);
    echo $new."<br>";

    // $new = substr_replace("ritu patel",'are',2);
    // echo "after index 2 all characters will be replaced with are : <strong>".$new."</strong><br>";
    // $replacewith = substr_replace("hellow",'imp',0);
    // echo "hellow replaced with : ".$replacewith;
?>  