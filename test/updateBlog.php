<?php

     require_once "update.php";
?>

<html>

    <body>
        <form method="POST" action="" enctype="multipart/form-data" >
        <script src="validate.js"></script>
            <div>
                <h2>Update Blog PAGE</h2>
            </div>
            <div id="user" >
           
                
                                    
                <div>
                    <label>Category : </label>
                    
                    <select name="blog[category][]" multiple>
                            <?php
                                $obj = new Connection();
                                $con = $obj ->dbConnect();
                                $selectUser = "select category_id,title from category ";
                                $result = mysqli_query($con,$selectUser);
                                while ($row = mysqli_fetch_row($result)) {
                                   
                                    // <?php// foreach ($rowArr as $value) :?>
                                        <?php $selected = array_intersect(getBlogValue('blog','category',[]),[$value]) ? "selected" : ''; ?>
                                        <option value="<?php echo $row[0];?>" <?php echo $selected; ?>><?php echo $row[1]; ?></option><?php
                                    // endforeach;
                                }
                            ?>
                           
                        </select>


                </div>
                <div>
                    <label>title : </label>
                    <input type="text" name="blog[title]"  value="<?php 
                        echo getBlogValue('blog','title'); ?>"  onblur="validateLname(this.value);"><br><br>
                               
                </div>
                <div>
                    <label>URl : </label>
                    <input type="text"  name="blog[url]" value="<?php echo getBlogValue('blog','url');?>" ><br><br>
                </div>

                
                <div>
                    <label>Content : </label>
                    <input type="text"  name="blog[content]" value="<?php 
                        echo getBlogValue('blog','content');?>" ><br><br>
                </div>
                <div>
                    <label>Image : </label>
                    <input type="file" name="file" ><br><br>
                </div>
                
               
                            
            </div>

            <br><br>
            <input type="submit" name="updateBlog" value="Update Blog">
                        
        </form>
       
    </body>
</html>