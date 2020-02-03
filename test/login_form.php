<?php

    require_once "login.php";

?>

<html>
    <body>
        <div>
            <h2>LOGIN PAGE</h2>
        </div>
        <form method="POST" action="">
            <div>
                <label>Email Id </label><br>
                <input type="text" name="email"><br><br>
            </div>
            <div>
                <label>Password</label><br>
                <input type="text" name="password"><br><br>

            </div>
            <div>
                <input type="submit" name="login" value="Login" >
                
            </div>
        
        </form>
        <form method="POST" action="registration.php">
        
            <input type="submit" name="register" value="Register" ><br><br>
        </form>
    </body>
</html>