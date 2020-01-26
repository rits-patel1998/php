<?php
    // session_start();
    if (isset($_POST['fname']) && isset($_POST['lname'])) {
        // echo $_POST['fname'];
        // echo time()+5;
        // $cookieName ='username';

        setcookie('username',$_POST['fname'],time()+3600);
        // echo $_COOKIE['username'];
        // setcookie('username',$_POST['fname'],time()-3600);   // to delete cookie
        
    }

?>
<form action="getting_Cookie.php" method="POST">

    First name : <input type="text" name="fname"><br>
    Last name : <input type="text" name="lname"><br>
    <input type="submit" name="submit" value="submit">
</form>