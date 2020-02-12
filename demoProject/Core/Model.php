<?php

namespace Core;
use PDO;

abstract class model{


	protected static function getDb(){
		
		
		static $db=Null;
		if ($db==Null) {
			$host = 'localhost';
			$dbName = 'mvc';
			$userName = 'root';
			$password = '';
			try{
				$db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $userName, $password);
				return $db;
			} 
			catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		else{
			return $db;
		}
		}
	}

	?>