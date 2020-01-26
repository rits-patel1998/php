<?php

    $filename = $_FILES['file']['name'];
    echo $tmp_name = $_FILES['file']['tmp_name'];
    if (isset($filename)) {
        if (!empty($filename)) {
            echo $filename;

            $location = 'file/';
            if ( move_uploaded_file($tmp_name, $location .$filename)) {
                echo "uploaded";
                
            }
            else {
                echo "Something went wrong";
            }
           
        }
        else{
            echo "choose file first";
        }
    }


?>
<html>
    <head>
        <script src="upload.js"></script>
    </head>
    <body >
        <form action="" method="POST" enctype="multipart/form-data" >
            <input type="file" name="file"><br>
            <input type="submit" name="submit" value="submit">
        
        </form>
    </body>


</html>