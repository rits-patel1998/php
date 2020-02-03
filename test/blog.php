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



function getBlogCleanArray($blogData){
    $blogArr = array( 
        "title" => $blogData['title'],
        "url" => $blogData['url'],
        "content" => $blogData['content'],
        "image" => "",
        "published_at" => $blogData['published_at'],
        "created_at" => $blogData['created_at'],
        "user_id" => $blogData['user_id']
    );
    return $blogArr;
   
}

function getBlogArray($postData){
    $blogCleanArray = getBlogCleanArray($postData['blog']);
    // print_r($blogCleanArray);
    if (insertValues(blog_post, $blogCleanArray)) {
       echo "Record Inserted";
       header('Location: showBlogPost.php');
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
    print_r($fieldname);
    echo "<br><br>";
    $arrfieldname = implode(",",$fieldname); 
    $arrValue = "'".implode("','",$value)."'";

    $query = "insert into $table ($arrfieldname) values($arrValue);";
    echo "<br>";
    print_r($query);


    $obj = new Connection();
    $con = $obj ->dbConnect();   


    if (mysqli_query($con,$query)) {
        echo "record inserted";
        return true;
    }
    else{
        echo "error in insert";
        return false;
    }
   
}

if (isset($_POST['addNewBlog'])) {
    print_r($_POST);
    getBlogArray($_POST);

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