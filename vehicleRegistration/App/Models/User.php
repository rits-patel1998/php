<?php

namespace App\Models;
use PDO;


class User extends \Core\Model{
	public static function getSingleData($email,$password){
		
		$db = static::getDB();
        echo $email;
        echo $password; 
        echo "select user_id,email,password from user where email = $email and password = $password";

		$stmt = $db->query("select user_id,email,password from user where email = '$email' and password = '$password'");

		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($result);
        // die();
        if ($stmt->rowCount()==1) {
             
            return $result[0]['user_id'];
            // die();
        }
        else{
		    return false;
        }
	}


	public static function insert($table,$postValues){
        $fieldname = [];
        $value = [];
        foreach($postValues as $field => $val){
            array_push($fieldname , $field);
            array_push($value , $val);
       	}
       
        $arrfieldname = implode(",",$fieldname); 
        $arrValue = "'".implode("','",$value)."'";
    
        $query = "insert into $table ($arrfieldname) values($arrValue);";
        // echo "<br>";
        
       	$db = static::getDB();
		if ($stmt = $db->exec($query)) {
            return $db->lastInsertId();
        }
        else{
        	return false;
        }
       
    }

	
	public static function update($tablename,$arrUser,$where){
    
        echo "<pre>";
            print_r($arrUser);
        
        echo "</pre>";
        echo $tablename;
        // die();
        $updateUser = "update $tablename set ". $arrUser[0]." where $where";
        echo $updateUser."<br>";
            // die();
        $db = static::getDB();
    	if ($stmt = $db->exec($updateUser)) {
        	return $stmt;
        }
        else{
        	return false;
        }
	}


	public static function delete($tablename , $where){
		$deletRow = "DELETE FROM $tablename WHERE $where";
		$db = static::getDB();
		if ($stmt = $db->exec($deletRow)) {
        	return $stmt;
        }
        else{
        	return false;
        }
	}
}

?>