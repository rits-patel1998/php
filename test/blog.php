<?php


session_start();
function getValue($section,$fieldname ,$return_type = ""){
        
    return (isset($_POST[$section][$fieldname]) 
        ? $_POST[$section][$fieldname] :
            isset($_SESSION[$section][$fieldname]) 
                ? $_SESSION[$section][$fieldname] : $return_type);

    
}


function setSessionValues($section){
    return (isset($_POST[$section]) ? $_SESSION[$section] = $_POST[$section] : [] );
}



function getBlogCleanArray($blogData,$file_location){
    $blogArr = array( 
        "title" => $blogData['title'],
        "url" => $blogData['url'],
        "content" => $blogData['content'],
        "image" => $file_location,
        "published_at" => $blogData['published_at'],
        "created_at" => date('Y-m-d H:i:s'),
        "user_id" => $_SESSION["logUserId"]
    );
    return $blogArr;
   
}

function getBlogArray($postData ,$file_location = ""){
    $blogCleanArray = getBlogCleanArray($postData['blog'],$file_location);
    echo "<hr>";

    // print_r($postData['blog']['category_name']);
    if ($lastId = insertValues('blog_post', $blogCleanArray)) {
        // dollarlastId = insertValues(blog_post, $blogCleanArray);
        echo $lastId;
        foreach ($postData['blog']['category_name'] as $value) {
           
                echo $value;
                $post_cat = array( 
                    "blog_post_id" => $lastId,
                    "category_id" => $value
                );

                
                insertValues('post_category', $post_cat);
                
        }
       echo "Record Inserted";
       echo $lastId;
       header('Location: showBlogPost.php');
           // INSERT INTO `post_category` (`blog_post_id`, `category_id`) VALUES ( '25', '13');
    }
}




function insertValues($table,$postValues){
    $fieldname = [];
    $value = [];
    foreach($postValues as $field => $val){
        array_push($fieldname , $field);
        array_push($value , $val);
        
        echo $table.' , '.$val.' , '.$field.'<br>';
     
    }
    // print_r($fieldname);
    echo "<br><br>";
    $arrfieldname = implode(",",$fieldname); 
    $arrValue = "'".implode("','",$value)."'";

    $query = "insert into $table ($arrfieldname) values($arrValue);";
    echo "<br>";
    echo $query;


    $obj = new Connection();
    $con = $obj ->dbConnect();   


    if (mysqli_query($con,$query)) {
        echo "record inserted";
        $last_blog_id = mysqli_insert_id($con);
        return $last_blog_id;
    }
    else{
        echo "error in insert";
        return false;
    }
   
}

function getSelectArray($row){
    $arr = [];
    print_r($row);
    for ($i = 0; $i < sizeof($row) ; $i++) { 
        array_push($arr, $row[$i]);
    }
    return $arr;
}


$file_location = "";
if (isset($_POST['addNewBlog'])) {
    // print_r($_POST);

    if (isset($_FILES['file'])) {
        $filename = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $location = 'file/';
        
        if ( move_uploaded_file($tmp_name, $location .$filename)) {
            echo "uploaded";
            echo $file_location = $location .$filename; 
            getBlogArray($_POST,$file_location);   
        }
        else {
            echo "Something went wrong";
        }
    }
    else{
        echo "choose file first";
    }
    
    setSessionValues('blog');
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
?>