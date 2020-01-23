<?php

    // $multidimensional = array('firstArr'=>array('red',20,'1'),
    //                         'secondArr'=>array('black',2.5)
    // );

    // foreach($multidimensional as $element => $innerArray){
    //     echo $element.'<br>';
    //     foreach($innerArray as $item){
    //         echo $item.'<br>';
    //     }
    // }
// ===================================================,,'third'=>array(10,20,30)

    $multidimensional = array('firstArr'=>array('red',20,'1'),
                              'secondArr'=>array('black',2.5,'third'=>array(10,20,30))
    );

    foreach($multidimensional as $element => $innerArray){
        echo $element.'<br>';
        foreach($innerArray as $item ){
            
            if(is_array($item)){
                foreach($item as $items){
                    echo $items.'<br>';
                    
                }
            }
            echo $item.'<br>';
            // else{
            //     echo $item."<br>";
            // }
        }
    }

    // print_r($multidimensional['secondArr']['third']);

?>