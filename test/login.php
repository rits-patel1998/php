<?php

    require_once "connection.php";
    session_start();
   
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        chkLogin($email,$password);
    
    }

    function chkLogin($email,$password){
        $obj = new Connection();
        $con = $obj ->dbConnect();
    
        $selectQuery = "select firstname,email,password from user where email = '$email' and password = '$password'";
        $result = mysqli_query($con,$selectQuery);
        $row = mysqli_fetch_row($result);
        $rowcount=mysqli_num_rows($result);
        if ($rowcount == 1) {
            $_SESSION["logUser"] = $row[0];
            echo "<script>alert('Login Successfull');</script>";
            header('Location: blogPostForm.php');
        }
        else{
            echo "Invalid login details";
        }

      
    }

?>