<?php

    require_once "connection.php";
    require_once "register.php";
        
?>

<html>
    <body>

    <form method="POST" action=""  enctype="multipart/form-data">
        <script src="validate.js"></script>
            <div>
                <h2>Add Category Page</h2>
            </div>
            <div id="blog" >
                <div>
                    <label>title: </label>
                    <input type="text" name="category[title]" value="<?php 
                        echo getValue('category','title'); ?>" >
                             
                </div>
                 
                <div>
                    <label>url : </label>
                    <input type="text" name="category[url]"  value="<?php 
                        echo getValue('category','url'); ?>">
                </div>
                <div>
                    <label>Content: </label>
                    <input type="text"  name="category[content]" value="<?php 
                        echo getValue('category','content');?>" >
                </div>

                <div>
                    <label>Image: </label>
                    <input type="file"  name="file" >
                </div>

                 <div>
                    <label>Parent category: </label>
                    <select name="category[parent]" >
                            <?php
                                $obj = new Connection();
                                $con = $obj ->dbConnect();
                                $selectUser = "select category_id,title from category";
                                $temparr = [];
                                $result = mysqli_query($con,$selectUser);
                                
                                while ($row = mysqli_fetch_array($result)) {
                                     array_push($temparr, $row);
                                }   print_r($temparr) ?>
                                <?php for($i = 0; $i < sizeof($temparr) ;$i++): ?>
                                    <?php $selected = in_array(getValue('category','parent'),[$value]) ? "selected" : ''; ?>
                                    <option value="<?php echo $temparr[$i]['category_id'];?>" <?php echo $selected; ?>><?php echo $temparr[$i]['title']; ?></option><?php
                                endfor;
                                
                            ?>
                           
                        </select>

                </div>

               

                
            </div>

            <br><br>
            <input type="submit" name="addCategory" value="Add New Category">
                        
        </form>
       
    </body>
</html>