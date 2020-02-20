<?php

namespace App\Models;
use PDO;


class Categories extends \Core\Model{
	public static function getAll(){
		
		$db = static::getDB();
		$stmt = $db->query('select category_id,category_name,url_key,image,status,description from category');
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		

		for ($i=0; $i < sizeof($result); $i++) { 
			echo $result[$i]['status'];
			if ($result[$i]['status'] == 0) {
				$result[$i]['status'] = 'Not Available';
			}
			else{
				$result[$i]['status'] = 'Available';
			}
		}
		
		return $result;
	}


    public function getProducts($url_key){
        echo $url_key;

        $db = static::getDB();
        $stmt = $db->query("SELECT 
                            p.*
                            from product p 
                            LEFT JOIN product_category pc
                                ON pc.product_id = p.product_id
                            LEFT JOIN category c
                                ON pc.category_id = c.category_id
                            WHERE c.url_key = '$url_key'
                                GROUP by p.product_name");
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
    
        echo $query = "insert into $table ($arrfieldname) values($arrValue);";
        // echo "<br>";
        
       	$db = static::getDB();
		if ($stmt = $db->exec($query)) {
        	return true;
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