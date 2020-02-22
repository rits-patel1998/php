<?php

namespace App\Models;
use PDO;


class Admin extends \Core\Model{
	public static function getAllData(){
		
		$db = static::getDB();
       
        echo "select * from vehicle_service";

		$stmt = $db->query("select * from vehicle_service");

		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // echo"<pre>";
        // print_r($result);
        // echo"<pre>";
        
        if ($stmt->rowCount()>=1) {
             
            return $result;
            // die();
        }
       
	}


    public static function getSingleData($service_id){
        $db = static::getDB();
        // echo "select * from vehicle_service where time_slot = 'timeSlot'";
        $stmt = $db->query("select * from vehicle_service where service_id = '$service_id'");

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // echo "<pre>";
        // print_r($result);
        // echo "<pre>";
        // // die();
       
        return $result;
       
    }

    public static function updateStatus($service_id, $status){
        $db = static::getDB();
        // $stmt = $db->query("UPDATE vehicle_service SET status = '$status' where service_id = '$service_id'");

        if ($stmt = $db->exec("UPDATE vehicle_service SET status = '$status' where service_id = '$service_id'")) {
            return $stmt;
        }
        else{
            return false;
        }


    }
	
	

	
}

?>