<?php

    require_once "connection.php";
    require_once "blog.php";
?>

<html>
    <body>

    <form method="POST" action="" enctype="multipart/form-data" >
        <script src="validate.js"></script>
            <div>
                <h2>Add Blog Page</h2>
            </div>
            <div id="blog" >
           
                
                                    
                <div>
                    <label>title: </label>
                    <input type="text" name="blog[title]" value="<?php 
                        echo getValue('user','title'); ?>" >
                    <label style="color: red;" name="titleError" ><br><br>
                                
                </div>
                 <div>
                    <label>Select Category : </label>
                    <select name="blog[category_name][]" multiple>
                            <?php
                                $obj = new Connection();
                                $con = $obj ->dbConnect();
                                $selectUser = "select category_id,title from category ";
                                $result = mysqli_query($con,$selectUser);
                                while ($row = mysqli_fetch_row($result)) {
                                   
                                    $rowArr = getSelectArray($row); ?>
                                    <?php foreach ($rowArr as $value) :?>
                                        <?php $selected = array_intersect(getValue('blog','category_name',[]),[$value]) ? "selected" : ''; ?>
                                        <option value="<?php echo $row[0];?>" <?php echo $selected; ?>><?php echo $row[1]; ?></option><?php
                                    endforeach;
                                }
                            ?>
                           
                        </select>

                    <br><br>
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
                    <input type="file" name="file" >
                </div>

                <div>
                    <label>published at : </label>
                    <input type="date"  name="blog[published_at]" value="<?php 
                        echo getValue('blog','published_at');?>" >
                    <label style="color: red;" name="published_atError" ><br><br>
                </div>

                
                    </div>

            <br><br>
            <input type="submit" name="addNewBlog" value="Add New Blog">
                        
        </form>
       
    </body>
</html>