
<?php

	
if (isset($_POST['addNewBlog'])) {
    print_r($_POST);
    getBlogArray($_POST);

    setSessionValues('blog');
}


if (isset($_POST['logout'])) {
    
    if (isset($_SESSION)) {
        session_destroy(); 
    }
    
    header('location: login_form.php');
}


if (isset($_POST['myProfile'])) {
    // print_r($_POST);
    echo "Profile clicked";
    header('location: updateForm.php');
    
}

?>
<html>
    <body>
    <form method="POST" >
        <input type="submit" name="addBlogPost" value="Add Blog Post"><br><br>
  
       <input type="submit" value="Log Out" name="logout"><br><br>
       <input type="submit" value="My Profile" name="myProfile"><br><br>
    </form>
      
    </body>
</html>