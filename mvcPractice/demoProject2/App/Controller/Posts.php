<?php
namespace App\Controller;

class Posts extends \Core\Controller{
	public function index(){
		echo "Index from Posts";
	}

	public function addNew(){
		echo "add new from Posts";
		print_r($this->route_params);
	}
}


?>