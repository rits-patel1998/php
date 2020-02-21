<?php

namespace Core;
use PDO;
use App\Config;

abstract class model{


	protected static function getDb(){
		
		
		static $db=Null;
		if ($db==Null) {
			// $host = 'localhost';
			// $dbName = 'mvc';
			// $userName = 'root';
			// $password = '';
			try{
				$db = new PDO("mysql:host=".Config::host.";dbname=".Config::dbName.";charset=utf8", Config::userName, Config::password);

				//WILL THROW EXception while error occur
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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