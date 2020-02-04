<?php
     
    require_once "connection.php";

    session_start();
    // session_destroy();
    echo $user_id = $_SESSION["logUserId"];
    $obj = new Connection();
    $con = $obj ->dbConnect();

    if ($_GET) {
        $blog_id = $_GET['blog_id'];
        echo $blog_id;
        $deleteQuery = "Delete from blog_post where blog_post_id = $blog_id";
        if (mysqli_query($con,$deleteQuery)) {
            echo "<script>alert('Record Deleted');</script>";
        }
    }

    $select = "select blog_post_id,category_name,title,published_at,user_id
                FROM blog_post WHERE user_id = $user_id";

    echo $select;
    ?>
    <h2>Show Blog Page</h2>
    <?php
    echo "<table border='3'>";
    ?><tr>
    
        <th>Blog Post Id</th>
        <th>Category</th>
        <th>title</th>
        <th>Published at</th>
        
        <th colspan = '2'>Actions</th>
        
    </tr>
    <?php
     $result = mysqli_query($con,$select);
     if ($result) {
         echo "Query successful";
     }
        while ($row = mysqli_fetch_row($result)) {
        print_r ($row );

        echo $row[0];
        echo "<tr>";?>
            <td> <?php echo $row[0] ?></td> <td><?php echo $row[1] ?> </td><td><?php echo $row[2] ?> </td><td><?php echo $row[3] ?> </td>
            <td><a href = 'showBlogPost.php?blog_id=<?php echo $row[0]; ?>'>delete</a></td>
            <td><a href = 'updateBlog.php?blog_id= <?php echo $row[0]; ?>'>Update</a></td>
            
        <?php
        echo "</tr>";
    }
    echo "</table>";


    
    if (isset($_POST['addBlogPost'])) {
        // print_r($_POST);
        
        header('location: addBlog.php');
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
    print_r($_POST);
    if (isset($_POST['showCategory'])) {
       
        header('location: showCategory.php');        
    }
?>


<html>
    <body>
    <hr>
    <form method="POST" >
        <input type="submit" name="addBlogPost" value="Add Blog Post"><br><br>
  
       <input type="submit" value="Log Out" name="logout"><br><br>
       <input type="submit" value="My Profile" name="myProfile"><br><br>
       <input type="submit" value="Manage Category" name="showCategory"><br><br>
    </form>
      
    </body>
</html>