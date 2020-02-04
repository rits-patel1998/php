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
        "category_name" => $blogData['category_name'],
        "url" => $blogData['url'],
        "content" => $blogData['content'],
        "image" => "",
        "published_at" => $blogData['published_at'],
        "created_at" => date('Y-m-d H:i:s'),
        "user_id" => $_SESSION["logUserId"]
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

function getSelectArray($row){
    $arr = [];
    print_r($row);
    for ($i = 0; $i < sizeof($row) ; $i++) { 
        array_push($arr, $row[$i]);

    }
    return $arr;
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