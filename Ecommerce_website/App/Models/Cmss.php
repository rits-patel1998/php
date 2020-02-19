<?php

namespace App\Models;
use PDO;


class Cmss extends \Core\Model{
    public static function getAll(){
        
        $db = static::getDB();
        $stmt = $db->query('select * from cms_pages');
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

    public static function insert($table,$postValues){
        $fieldname = [];
        $value = [];
        foreach($postValues as $field => $val){
            array_push($fieldname , $field);
            array_push($value , $val);
        }
       
        $arrfieldname = implode(",",$fieldname); 
        $arrValue = "'".implode("','",$value)."'";
    
        $query = "insert into $table ($arrfieldname) values($arrValue)";
        
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