<?php

// require_once "register.php";
require_once "Connection.php";
session_start();

$obj = new Connection();
$con =$obj ->dbConnect();   

function getValue($section,$fieldname ,$return_type = ""){
    if (isset($_SESSION['logUser'])) {
        $user_id =  $_SESSION["logUserId"];
        return showValue($section,$fieldname,$user_id);
    }
    else{
        return (isset($_POST[$section][$fieldname]) 
            ? $_POST[$section][$fieldname] :
                isset($_SESSION[$section][$fieldname]) 
                    ? $_SESSION[$section][$fieldname] : $return_type);

    }

        
}
function getUserCleanArray($userData){
    $userArr = array( 
        "prefix" => $userData['prefix'],
        "firstname" => $userData['firstname'],
        "lastname" => $userData['lastname'],
        "email" => $userData['email'],
        "phoneno" => $userData['phoneno'],
        "password" => $userData['password'],
        "information" => $userData['information'],
    );
    return $userArr;
   
}
function showValue($section,$fieldname,$user_id){
    // echo "$section";
    $obj = new Connection();
    $con =$obj ->dbConnect();   

    $selectQuery = "Select * from user where user_id = $user_id";
    $result = mysqli_query($con,$selectQuery);
    $row = mysqli_fetch_assoc($result);
    // print_r($row);
    
    return updateSet($section,$fieldname,$row);

}
if (isset($_POST['update'])) {
    
    $userCleanArray = getUserCleanArray($_POST['user']);
   
    // print_r($otherCleanArray);
    
    function prepareArr($array){
        $arrUser = [];
        $arrUserimploded = [];
        foreach ($array as $key => $value) {
            $strValues = "$key = '$value'";
            array_push( $arrUser,  $strValues );
        }
        
        array_push($arrUserimploded, implode(',',$arrUser));
        return $arrUserimploded;
    }

    $userPreparedArray = prepareArr($userCleanArray);
    
    update($userPreparedArray); 
    
    
}
function update($arrUser){
    
    echo "<pre>";
        print_r($arrUser);
    
    echo "</pre>";
    echo $user_id = $_SESSION['logUserId'];
   
    $updateUser = 'update user set '. $arrUser[0]." where user_id = $user_id";
        echo $updateUser."<br>";
        $obj = new Connection();
        $con =$obj ->dbConnect();       
        if (mysqli_query($con,  $updateUser)) {
        
            echo "record updated";
            header("location: showBlogPost.php");

        
        }
    return true;
}



function updateSet($section,$fieldname,$row){

    switch ($fieldname) {
        case 'firstname':
            return $row['firstname']; 
            break;
        case 'lastname':
            return $row['lastname']; 
            break;
        case 'email':
            return $row['email']; 
            break;
        case 'phoneno':
            return $row['phoneno']; 
            break;
        
        case 'password':
            return $row['password']; 
            break;
        case 'information':
            return $row['information']; 
            break;
        
        
        default:
            # code...
            break;
    }
}
function updateBlogSet($section,$fieldname,$row){

    switch ($fieldname) {
        case 'category':
            return $row['category_name']; 
            break;
        case 'title':
            return $row['title']; 
            break;
        case 'url':
            return $row['url']; 
            break;
        case 'content':
            return $row['content']; 
            break;
        default:
            # code...
            break;
    }
}
function showBlogValue($section,$fieldname,$blog_id){
    // echo "$section";
    $obj = new Connection();
    $con =$obj ->dbConnect();   

    $selectQuery = "Select * from blog_post where blog_post_id = $blog_id";
    $result = mysqli_query($con,$selectQuery);
    $row = mysqli_fetch_assoc($result);
    // print_r($row);
    
    return updateBlogSet($section,$fieldname,$row);

}
function getBlogValue($section,$fieldname ,$return_type = ""){
    if (isset($_GET['blog_id'])) {
        $_SESSION["blog_id"] = $_GET['blog_id'];
        $blog_id =  $_SESSION["blog_id"];
        return showBlogValue($section,$fieldname,$blog_id);
    }
    else{
        return (isset($_POST[$section][$fieldname]) 
            ? $_POST[$section][$fieldname] :
                isset($_SESSION[$section][$fieldname]) 
                    ? $_SESSION[$section][$fieldname] : $return_type);

    }

        
}

function getBlogCleanArray($blogData){
    $blogArr = array( 
        "category_name" => $blogData['category'],
        "title" => $blogData['title'],
        "url" => $blogData['url'],
        "content" => $blogData['content'],
        "image" => "",
        "updated_at" => date('Y-m-d H:i:s'),
    );
    return $blogArr;
   
}
function updateBlog($arrBlog){
    
    // echo "<pre>";
    //     print_r($arrBlog);
    
    // echo "</pre>";
    echo $blog_id = $_SESSION['blog_id'];
   
    $updateBlog = 'update blog_post set '. $arrBlog[0]." where blog_post_id = $blog_id";
        echo $updateBlog."<br>";
        $obj = new Connection();
        $con =$obj ->dbConnect();       
        if (mysqli_query($con,  $updateBlog)) {
        
            echo "record updated";
            header("location: showBlogPost.php");

        
        }
    return true;
}
if (isset($_POST['updateBlog'])) {
    
    $blogCleanArray = getBlogCleanArray($_POST['blog']);
   
    // print_r($otherCleanArray);
    
    function prepareArr($array){
        $arrUser = [];
        $arrUserimploded = [];
        foreach ($array as $key => $value) {
            $strValues = "$key = '$value'";
            array_push( $arrUser,  $strValues );
        }
        
        array_push($arrUserimploded, implode(',',$arrUser));
        return $arrUserimploded;
    }

    $blogPreparedArray = prepareArr($blogCleanArray);
    // print_r($blogPreparedArray);
    updateBlog($blogPreparedArray); 
    
    
}

?>