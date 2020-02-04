<?php

     require_once "update.php";
?>

<html>

    <body>
        <form method="POST" action="">
        <script src="validate.js"></script>
            <div>
                <h2>Update Blog PAGE</h2>
            </div>
            <div id="user" >
           
                
                                    
                <div>
                    <label>Category : </label>
                    <input type="text" name="blog[category]" value="<?php 
                        echo getBlogValue('blog','category'); ?>" onblur="validateFname(this.value);">
                              
                </div>
                <div>
                    <label>title : </label>
                    <input type="text" name="blog[title]"  value="<?php 
                        echo getBlogValue('blog','title'); ?>"  onblur="validateLname(this.value);">
                               
                </div>
                <div>
                    <label>URl : </label>
                    <input type="text"  name="blog[url]" value="<?php echo getBlogValue('blog','url');?>" >
                </div>

                
                <div>
                    <label>Content : </label>
                    <input type="text"  name="blog[content]" value="<?php 
                        echo getBlogValue('blog','content');?>" >
                </div>
                <div>
                    <label>Image : </label>
                    <input type="file" name="user[password]" >
                </div>
                
               
                            
            </div>

            <br><br>
            <input type="submit" name="updateBlog" value="Update Blog">
                        
        </form>
       
    </body>
</html>