<?php

class Adapter{
	protected $config =[
		"host" => 'localhost',
		"username" => 'root',
		"password" => '',
		"dbname" => 'testmvc'
	]; 
	protected $query;
	protected $connect;

	public function setConfig($config){
		if (!is_array($config)) {
			throw new Exception("config is not an array");
			
		}
		$this->config = array_merge($this->config,$config); 
		return $this->config;
	}

	public function setConnect($connect){
		$this->connect = $connect;
		return $this->connect;
	}

	public function getConnect(){
		return $this->connect;
	}


	public function connect(){
		$connect = new mysqli($this->config['host'],$this->config['username'],$this->config['password'],$this->config['dbname']);
		$this->setConnect($connect);
	}


	public function isConnected(){
		if (!$this->getConnect()) {
			return false;
		}
		return true;

	}
	


	public function setQuery($query){
		echo $this->query = $query;
		return $this->query;

	}

	public function getQuery(){
		return $this->query;
	}


	public function query($query){
		if (!$this->isConnected()) {
			// echo "Connected";
			// die();
			$this->connect();
		}
		echo "Connected";
		$this->setQuery($query);
		$result = $this->getConnect()->query($this->getquery());
		return $result;
	}

	public function insert($query){
		$result = $this->query($query);	
		// echo $result;
		if ($result) {
			return $this->getConnect()->insert_id;
		}
	}
	public function update($query){
		$result = $this->query($query);	
		// echo $result;
		if (!$result) {
			return false;
		}
		return true;
	}

	public function show($query){
		$result = $this->query($query);	
		// echo $result;
		echo "<pre>";
		print_r($result);
		echo "</pre>";die();

		// if ($result) {
		// 	return $this->getConnect()->insert_id;
		// }
	}
}

$config =[
		"host" => 'localhost',
		"username" => 'root',
		"password" => '',
		"dbname" => 'testmvc'
];

$adapterObj = new Adapter();

$set = $adapterObj->setConfig($config);
// echo "<pre>";
// print_r($set);
// echo "</pre>";

// $adapterObj->insert("INSERT INTO `user` (`firstName`,`lastname`,`email`,`password`,`phoneno`) VALUES ('ritu','patel','ritu@gmail.com','123456','12121212')");

// $adapterObj->show("select * form `user`");


?>