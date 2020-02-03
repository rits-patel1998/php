<?php
    require_once "showBlogPost.php";
    session_start();
    echo $_SESSION["logUser"];
    

?>
<hr>
<html>
    <body>
    <form method="POST" action="addBlog.php">
        <input type="submit" name="addBlogPost" value="Add Blog Post"><br><br>
  
       <input type="submit" value="Log Out" name="logout"><br><br>
       <input type="submit" value="My Profile" name="myProfile"><br><br>
    </form>
      
    </body>
</html>