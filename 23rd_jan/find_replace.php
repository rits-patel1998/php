<?php

    if (isset($_POST['text']) && isset($_POST['find']) && isset($_POST['replace'])) {
     
        $text = $_POST['text'];
        $find = $_POST['find'];
        $replace = $_POST['replace'];

        $new_string = str_replace( $find,  $replace , $text);
        echo $new_string;

        // $offset = 0;
        // $temp = strpos($text ,$find ,$offset);
        // echo $temp;
        // $length = strlen($find);
        // while ($temp = strpos($text ,$find ,$offset)) {
        //     echo $temp .'<br>';
        //     echo $offset = $temp + $length.'<br>';
        //     $replaced = substr_replace($text ,$replace ,$temp ,$length);

        // }
        // echo $replaced;
    }

?>

<form method="POST" action="find_replace.php">

    <textarea name="text" rows="5" cols="25"></textarea><br><br>
    Find : <input type="text" name="find"><br><br>
    Replace : <input type="text" name="replace"><br><br>
    <input type="submit" name="submit" value="find and Replace">


</form>