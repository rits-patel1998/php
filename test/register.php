<?php
    require_once "connection.php";
    function getValue($section,$fieldname ,$return_type = ""){
        
        return (isset($_POST[$section][$fieldname]) 
            ? $_POST[$section][$fieldname] :
                isset($_SESSION[$section][$fieldname]) 
                    ? $_SESSION[$section][$fieldname] : $return_type);

        
    }


    function setSessionValues($section){
        return (isset($_POST[$section]) ? $_SESSION[$section] = $_POST[$section] : [] );
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
    function getBlogCleanArray($blogData){
        $blogArr = array( 
            "title" => $blogData['prefix'],
            "url" => $blogData['firstname'],
            "content" => $blogData['lastname'],
            "image" => $blogData['email'],
            "published_at" => $blogData['phoneno'],
            "created_at" => $blogData['password'],
            "user_id" => $blogData['information'],
        );
        return $blogArr;
       
    }

    function getArray($postData){
        $userCleanArray = getUserCleanArray($postData['user']);
        // print_r($userCleanArray);
        if (insertValues(array_keys($postData)[0], $userCleanArray)) {
           echo "Record Inserted";
           header('Location: blogPostForm.php');
        }
    }
   
    
    
    
    if (isset($_POST['register'])) {
        getArray($_POST);
        setSessionValues('user');
    }

    if (isset($_POST['addNewBlog'])) {
        getBlogArray($_POST);
        setSessionValues('blog');
    }

    

?>