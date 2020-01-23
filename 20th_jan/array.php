<?php


    $fruit = array('apple','pinaple');
    print_r($fruit);
    echo "<br><br>";

    $fruit =['apple' =>'red' ,'pinaple'=>'yellow'];
    var_dump($fruit);echo "<br><br>";

    echo $fruit['apple']."<br><br>";

// ======-========================================================

    $temp = [1 => 'red',true=>'black',"1" => 'pink',2.5 => 'blue'];
    print_r($temp);
    echo "<br><br>";

    // for($i = 0 ; $i < sizeOf($temp); $i++){
    //     echo "$temp[$i]";
    // }

// ====================================================================

    $temp = ["first" => 'red',"second"=>'black',3 => 'pink',2.5 => 'blue'];
    print_r($temp);
    echo "<br><br>";

    //no difference between string or integer keys

// ==================================================================

    $temp = ["first" => 'red',"second"=>'black',3 => 'pink',2.5];
    print_r($temp);
    echo "<br><br>";
    
    
// ============================================


    $temp = ['red',"second"=>'black',4 => 'pink',2.5 => 'blue'];
    print_r($temp);
    echo "<br><br>";

?>