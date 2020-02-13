<?php
namespace App\controller;

class Home extends \Core\Controller{
	public function index(){
		echo "Index from Home";
	}

	public function addNew(){
		echo "Add new from Home";
		print_r($this->route_params);
	}
}


?>