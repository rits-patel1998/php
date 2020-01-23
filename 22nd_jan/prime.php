<?php

    if (isset($_POST['no']) && (!empty($_POST['no']))) {
        $no = $_POST['no'];
        $cnt = 0;
        echo $no;
        
        for ($i = 1; $i <= $no; $i++) { 
            if ($no % $i == 0) {
                echo $i.'<br>';
                $cnt++;
                echo 'counter is: ' .$i.'<br>';
            }
        }
        if ($cnt == 2) {
            echo "No is prime";
        }
        else{
            echo "No is not prime";
        } 
    }
    
?>
<form method="POST">
    <input type="number" name="no" >
    <input type="submit" value="Prime or not..?">
</form>