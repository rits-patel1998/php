<?php
    session_start();
    if (isset($_POST['fname']) && isset($_POST['lname'])) {
        echo $_POST['fname'];

        $_SESSION['name'] = $_POST['fname'];
    }

?>
<form action="getting_session.php" method="POST">

    First name : <input type="text" name="fname"><br>
    Last name : <input type="text" name="lname"><br>
    <input type="submit" name="submit" value="submit">
</form>