<?php

require_once "connection.php";
$obj = new Connection();
$con = $obj ->dbConnect();

function deleteCategory($category_id){
    global $con;    
    $delete = "DELETE from category where category_id = $category_id";
    
    // echo "<script>confirm(Are you sure..?);</script>";
    if ( mysqli_query($con, $delete)) {
        echo "record Deleted";
    }
    else{
        echo "Erro in delete";
    }
       
}

function displayTable(){
    global $con;    
    $select = "SELECT category_id,image,title from category";
    $result =  mysqli_query($con, $select);
    // print_r($row = mysqli_fetch_assoc($result));
    ?>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <?php foreach($row as $key => $value) { 


                if ($key == "image") { ?>
                    <td><img src="<?php echo $value; ?>" style ="height: 50px; width: 50px;"></td>
                <?php 
                }
                else{
                ?>
                    <td><?php echo $value; ?></td>
                <?php 
                }
            } ?>
                <td><a href="">UPDATE</a></td>
                <td><a href='showCategory.php?category_id= <?php echo $row["category_id"]; ?>'>DELETE</a></td>
            
        </tr>
    
<?php
    }
}


function displayHeader(){
    global $con;    
    $select = "SELECT category_id,image,title from category";
    $result =  mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($result);
    ?>

    
        <tr>
            <?php foreach($row as $key => $value) { ?>
                <th><?php echo $key; ?></th>
            <?php } ?>
            <th colspan="2">Actions</th>
        </tr>
    
<?php
}




?>
