<?php


    if (isset($_POST['year']) && (!empty($_POST['year']))) {
        $year = $_POST['year'];
        
        if ($year % 4 == 0) {
            echo "$year is a leap Year";
        }
        else{
            echo "$year is not a leap Year";
        }
    }

?>
<form method="POST">
<input type="number" name="year" >
<input type="submit" value="Prime or not..?">
</form>

