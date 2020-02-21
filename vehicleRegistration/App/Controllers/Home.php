<?php

	namespace App\Controllers;
	use \Core\View;
	class Home extends \Core\Controller
	{

		protected function before(){
			// echo "(before)  ";
			// return false;
		}

		protected function after(){
			// echo "(after)  ";
		}


		function index(){
			// echo "index in home class called";
			// View::render('Home/index.php',[

			// 	'name' => 'Ritu',
			// 	'colors' => ['red','Green','Blue']

			// ]);

			$base_url = $_SESSION['base_url'];
			View::renderTemplate('Home/index.html',[

				'name' => 'Ritu',
				'colors' => ['red','Green','Blue'],
				'base_url'=> $base_url

			]);
		}

		public function editAction(){
			echo "Route Parameters : <pre>".print_r($this->route_params,true)."</pre>";
		}


		
			
	}
?>