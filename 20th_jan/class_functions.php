<?php

    function callStudent(){
        echo "calling main class<br>    ";
        function callSubStudent(){
            echo "innerFunction called with outer<br><br>";
        }
    }
    callStudent();
    callSubStudent();

// recursion function==================

    function recursion($num){
        if ($num<10) {
            // echo "$num";
            recursion($num+1);
            echo "$num<br>";
        }

    }
    recursion(5);
// =====================================================

// $flag =false;


// if($flag) {
//     function showInnerFunction(){
        
//         echo "Will called when flag is true.";
//     }
// }
// else{
//     echo "===========";
// }
// mainFunction();

// function mainFunction(){
//   echo "will called when program execution starts";

// }


function foo(&$var)
{
    $var++;
    echo "$var";
}
$a=5;

foo($a);
// ======================================================


// function plusTwo($num1,$num2){

//     function subTwo($num1,$num2){
//         echo $num1+$num2;
//         $res = plusTwo(10,20);
//         echo "$res";
//     }
// }

// plusTwo(10,20);

?>