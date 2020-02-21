<?php

namespace App\Models;
use PDO;


class VehicleService extends \Core\Model{
	
    public static function getSlot($timeSlot){
        $db = static::getDB();
        $timeSlot = $timeSlot;
        // die();
        // echo "select * from vehicle_service where time_slot = 'timeSlot'";
        $stmt = $db->query("select * from vehicle_service where time_slot = '$timeSlot'");

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // echo "<pre>";
        // print_r($result);
        // echo "<pre>";
        // // die();
        $stmt->rowCount();
        // die();
        if ($stmt->rowCount()>3) {
             
            return 0;

        }
        else{
            return $timeSlot;
        }
    }


    public static function getAll($user_id){
        $db = static::getDB();
        // $timeSlot = $timeSlot;
        // die();
        // echo "select * from vehicle_service where time_slot = 'timeSlot'";
        $stmt = $db->query("select * from vehicle_service where user_id = '$user_id'");

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
        
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