<?php
// Write a program to find factor of any number


    if (isset($_POST['no']) && (!empty($_POST['no']))) {
        $no = $_POST['no'];
      
        echo "Factors of $no :<br>";
        for ($i = 1; $i <= $no; $i++) { 
            if ($no % $i == 0) {
                echo $i.'<br>';
                // $cnt++;
                // echo 'counter is: ' .$i.'<br>';
            }
        }
        
    }
    
?>
<form method="POST">
    <input type="number" name="no" >
    <input type="submit" value="Factors">
</form>