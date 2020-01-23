<?php

    $arrSum = array(10,20,30,40,50);
    echo "length of array: ". sizeOf($arrSum);
    for ($index = 0; $index < sizeOf($arrSum); $index++) { 
        // echo $arrSum[$index];
        $arrSum[$index]+=10;
        echo "<br>".+$arrSum[$index]."<br>";
    }

// =======================================


    $total=10;
    function abc(){
        global $total;                  //use of global variable
        echo $total+10;
    }
    abc();
    function xyz(){
        global $total;                  //use of global variable
        echo $total+20  ;
    }

    xyz();
    echo $total;
?>