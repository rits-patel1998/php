<?php
session_start();
echo"<pre>";
// print_r($_POST);
echo"</pre>";


function getValue($section,$fieldname ,$return_type = ""){
    
    return (isset($_POST[$section][$fieldname]) 
        ? $_POST[$section][$fieldname] :
             isset($_SESSION[$section][$fieldname]) 
                ? $_SESSION[$section][$fieldname] : $return_type);

    
}

function setSessionValues($section){
    return (isset($_POST[$section]) ? $_SESSION[$section] = $_POST[$section] : [] );
}

print_r(setSessionValues('account'));
print_r(setSessionValues('address'));
print_r(setSessionValues('other'));

?>