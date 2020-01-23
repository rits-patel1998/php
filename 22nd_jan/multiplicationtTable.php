<?php
// Write a program to find table of a number



    if (isset($_POST['no']) && (!empty($_POST['no']))) {
        $no = $_POST['no'];
      
        echo "Factors of $no :<br>";
        for ($i = 1; $i <= 10; $i++) { 
            echo "$no * $i = " .((int)($no) * (int)($i)).'<br>';
        }
        
    }
    // echo
?>
<form method="POST">
    <input type="number" name="no" >
    <input type="submit" value="Multiplication Table">
</form>