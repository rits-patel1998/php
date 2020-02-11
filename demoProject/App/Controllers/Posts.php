<?php

	namespace App\Controllers;
	class Posts extends \Core\Controller
	{

		public function indexAction(){
			echo "Index function called";
			echo "Query String : <pre>".print_r($_GET,true) . "</pre>";
		}

		public function addNewAction(){
			echo "Show post called";
		}

		public function editAction(){
			echo "<hr>";
			echo "edit from posts conroller";
			echo "Route Parameters : <pre>".print_r($this->route_params,true)."</pre>";
		}

	}

?>