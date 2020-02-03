<?php
    require_once "connection.php";
    $obj = new Connection();
    $con = $obj ->dbConnect();

    if ($_GET) {
        $user_id = $_GET['user_id'];
        echo $user_id;
        $deleteQuery = "Delete from user where user_id = $user_id";
        if (mysqli_query($con,$deleteQuery)) {
            echo "<script>alert('Record Deleted');</script>";
        }
    }

    $select = "select b.blog_post_id,c.title,b.published_at 
                FROM category c,blog_post b,post_category pc
                WHERE
                c.category_id = pc.category_id
                AND b.blog_post_id = pc.blog_post_id";

    $result = mysqli_query($con,$select);
    ?>
    <h2>Show Blog Page</h2>
    <?php
    echo "<table border='3'>";
    ?><tr>
    
        <th>Blog Post Id</th>
        <th>title</th>
        <th>Published at</th>
        
        <th colspan = '2'>Actions</th>
        
    </tr>
    <?php
    while ($row = mysqli_fetch_row($result)) {
        print_r ($row );

        echo $row[0];
        echo "<tr>";?>
            <td> <?php echo $row[0] ?></td> <td><?php echo $row[1] ?> </td><td><?php echo $row[2] ?> </td>
            <td><a href = 'showBlogPost.php?user_id=<?php echo $row[0]; ?>'>delete</a></td>
            <td><a href = '?cust_id=<?php// echo $row[0]; ?>'>Update</a></td>
        <?php
        echo "</tr>";
    }
    echo "</table>";


    
?>