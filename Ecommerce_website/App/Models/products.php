<?php

namespace App\Models;
use PDO;


class products extends \Core\Model{
	public static function getAll(){
		
		$db = static::getDB();
		$stmt = $db->query('SELECT 
								p.product_id,
								p.product_name,
								p.SKU,
								p.url_key,
								p.image,
								p.status,
								p.description,
								p.short_description,
								p.price,
								p.stock  ,
								GROUP_CONCAT(c.category_name) as "category_name"
							FROM 
								product p
							LEFT JOIN product_category pc on
							    pc.product_id = p.product_id
							LEFT JOIN category c ON
								c.category_id = pc.category_id GROUP by p.product_name');
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		

		return $result;

	}


	public static function insert($table,$postValues){
        $fieldname = [];
        $value = [];
        echo"<pre>";
        print_r($postValues);
        echo"</pre>";
        
        foreach($postValues as $field => $val){
            array_push($fieldname , $field);
            array_push($value , $val);
       	}
       
        $arrfieldname = implode(",",$fieldname); 
        $arrValue = "'".implode("','",$value)."'";
    
        echo $query = "insert into $table ($arrfieldname) values($arrValue)";
        // echo "<br>";
       	$db = static::getDB();
		if ($stmt = $db->exec($query)) {
        	$lastId = $db->lastInsertId();
        	return $lastId;
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

	public static function update($tablename,$arrUser,$where){
    
        
        echo $tablename;
        // die();
        $updateUser = "update $tablename set ". $arrUser[0]." where $where";
        echo $updateUser."<br>";
           
        $db = static::getDB();
    	if ($stmt = $db->exec($updateUser)) {
        	return $stmt;
        }
        else{
        	return false;
        }
	}

}

?>