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


		function indexAction(){
			// echo "index in home class called";
			// View::render('Home/index.php',[

			// 	'name' => 'Ritu',
			// 	'colors' => ['red','Green','Blue']

			// ]);
			View::renderTemplate('Home/index.html',[

				'name' => 'Ritu',
				'colors' => ['red','Green','Blue'],
				'base_url'=>dirname($_SERVER['SCRIPT_NAME'])

			]);
		}

		public function editAction(){
			// echo "Route Parameters : <pre>".print_r($this->route_params,true)."</pre>";
		}


		
			
	}
?>