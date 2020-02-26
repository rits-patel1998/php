<?php
require_once "Adapter.php";
class Row extends Adapter{

	protected $tablename = 'user';
	protected $primaryKey = '';
	protected $data = [];
	protected $rowChanged = '';



	public function setTableName($tablename){
		$this->tablename = $tablename;
		return $this->tablename;
	}

	public function getTablename(){
		return $this->tablename; 
	}


	public function setPrimaryKey($primaryKey){
		$this->primaryKey = $primaryKey;
		return $this->primaryKey;
	}

	public function getPrimaryKey(){
		return $this->primaryKey;
	}


	public function setData($data){

		if (!is_array($data)) {
			throw new Exception("Data must be an array");
		}

		$this->data = $data;
		return $this->data;
	}

	public function getData(){
		return $this->data;
	}

	public function setRowChanged($rowChanged){
		$this->rowChanged = $rowChanged;
		return $this->rowChanged;
	}

	public function getRowChanged(){
		return $this->rowChanged;
	}

	public function __set($key,$value){
		
		$this->data[$key] = $value;

	}

	public function __get($key){

		return $this->data[$key];

	}

	public function load($user_id){
		$tablename = $this->getTablename();
		echo $primaryKey = $this->getPrimaryKey();

		echo $query = "Select * from $tablename where $primaryKey = '$user_id'";
		// print_r($this->getConnect());
		// die();	
		$result = $this->getConnect()->query($query);
		$selectData = $result->fetch_assoc();
		

		$this->setData($selectData);
		echo "<pre>";
		print_r($selectData);
		echo "<pre>";
	}

	public function insertData(){

		$tablename = $this->getTablename();
		
		$arrfieldname = implode(",",array_keys($this->getData())); 
		$arrValue = "'".implode("','",$this->getData())."'";

		// $adapter = new Adapter();
		return $this->insert("INSERT INTO $tablename ($arrfieldname) values ($arrValue)");

	} 
	
	public function updateData($userid){
		$tablename = $this->getTablename();
		$primaryKey = $this->getPrimaryKey();
		$arr =[];
				
		foreach ($this->data as $key => $value) {
			 // = "$key = '$value'";
			 array_push($arr, "$key = '$value'");
			

		} 
		
		$arrayImploded = implode(',', $arr);
		echo "<pre>";
		print_r($arrayImploded);
		echo "</pre>";
		// die();
		return $this->update("UPDATE $tablename SET $arrayImploded WHERE $primaryKey = $userid");


	}
}

	$row = new Row();

	echo "<pre>";
	print_r($row);
	echo "</pre>";

	$row->firstname = 'ritu';
	$row->lastname = 'patel';
	$row->email = 'kbkunjan@gmail.com';
	$row->password = '123456';
	$row->phoneno = '523614563';
	$row->setPrimaryKey('user_id');
	$row->setTableName('user');
	
	// echo $last_id = $row->insertData();
	// $row->user_id = $last_id;

	$row->updateData('15');
	// $row->load('15');

?>