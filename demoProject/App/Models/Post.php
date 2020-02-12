<?php

namespace App\Models;
use PDO;


class Post extends \Core\Model{
	public static function getAll(){
		
		$db = static::getDB();
		$stmt = $db->query('select id,title,content from posts order by created_at');
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;

	}

	public static function insert($query){
		
		$db = static::getDB();
		$stmt = $db->exec($query);
		return $stmt;
	}
}

?>