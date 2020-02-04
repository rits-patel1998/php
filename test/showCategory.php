
<?php
    require_once "connection.php";
    require_once "category.php";
    session_start();


    if (isset($_GET['category_id'])) {
        
        $_SESSION['category_id'] = $_GET['category_id'];
        $category_id =  $_SESSION['category_id'];
        // deleteCategory($category_id);
    }
	
    if (isset($_POST['addCategory'])) {
        
       header('location: addCategoryForm.php');
       
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

    if (isset($_POST['showCategory'])) {
       
        header('location: showCategory.php');
        
    }

?>

<html>
    <body>
        <h2>Show Category</h2>
       <div>
            <table border="3">
            <?php

                displayHeader();
                displayTable();

            ?>
        </table>
       </div>
    <hr>
    <form method="POST" >
        <input type="submit" name="addCategory" value="Add Category"><br><br>
  
       <input type="submit" value="Log Out" name="logout"><br><br>
       <input type="submit" value="My Profile" name="myProfile"><br><br>
        <input type="submit" value="Manage Category" name="showCategory"><br><br>
    </form>
      
    </body>
</html>