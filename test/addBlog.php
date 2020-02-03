<?php

    require_once "connection.php";
    require_once "blog.php";
?>

<html>
    <body>

    <form method="POST" action="">
        <script src="validate.js"></script>
            <div>
                <h2>Add Blog Page</h2>
            </div>
            <div id="blog" >
           
                
                                    
                <div>
                    <label>title: </label>
                    <input type="text" name="blog[title]" value="<?php 
                        echo getValue('user','title'); ?>" onblur="validateFname(this.value);">
                    <label style="color: red;" name="titleError" ><br><br>
                                
                </div>
                <div>
                    <label>url : </label>
                    <input type="text" name="blog[url]"  value="<?php 
                        echo getValue('blog','url'); ?>">
                    <label style="color: red;" name="urlError" ><br><br>
                                    
                </div>
                <div>
                    <label>Content: </label>
                    <input type="text"  name="blog[content]" value="<?php 
                        echo getValue('blog','content');?>" >
                    <label style="color: red;" name="contentError" ><br><br>
                </div>

                <div>
                    <label>Image: </label>
                    <input type="file"  name="file" >
                </div>

                <div>
                    <label>published at : </label>
                    <input type="date"  name="blog[published_at]" value="<?php 
                        echo getValue('blog','published_at');?>" >
                    <label style="color: red;" name="published_atError" ><br><br>
                </div>

                <div>
                    <label>created at : </label>
                    <input type="date"  name="blog[created_at]" value="<?php 
                        echo getValue('blog','created_at');?>" >
                    <label style="color: red;" name="created_atError" ><br><br>
                </div> 
                <div>
                    <label>Select User : </label>
                    <select name="blog[user_id]">
                            <?php
                                $obj = new Connection();
                                $con = $obj ->dbConnect();
                                $selectUser = "select user_id from user ";
                                $result = mysqli_query($con,$selectUser);
                                while ($row = mysqli_fetch_row($result)) {
                                    ?><option value="<?php echo $row[0];?>"><?php echo $row[0]; ?></option><?php
                                }
                            ?>
                           
                        </select>

                    <br><br>
                </div>     
            </div>

            <br><br>
            <input type="submit" name="addNewBlog" value="Add New Blog">
                        
        </form>
       
    </body>
</html>