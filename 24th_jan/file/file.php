<?php
    if (isset($_POST['text'])) {
        // echo $_POST['fname'];
            
        $handle = fopen('filePractice.txt','r');
        
        fwrite($handle ,$_POST['text']."\n");
        echo 'written';
        fclose($handle);

        $cnt = 1;

        // $readFile = file('filePractice.txt');
        // $length = count($readFile);
        // foreach ($readFile as $value) {
        //     echo $value;
        //     if ( $cnt != $length ) {
        //         echo ", "; 
        //     }
        //     $cnt++;
        // }


        //===============another method of reading file ======================================
        $handle = fopen('filePractice.txt','r');
        $readFile = fread( $handle,filesize('filePractice.txt'));
        
        $arr = explode(',',$readFile);
        foreach ($arr as $val) {
            echo $val."\n";
        }
        // echo/ $readFile;
    }

    

?>

  

<form action="" method="POST">

First name : <input type="text" name="text"><br>
<input type="submit" name="submit" value="submit">
</form>