

<?php

	// session_start();
	// require_once '../v.php';
require "../vendor/autoload.php";

	spl_autoload_register(function ($className){
		$rootDir = dirname(__DIR__);
		$file = $rootDir ."/".str_replace('\\','/', $className).'.php';
		if (is_readable($file)) {
			require $rootDir.'/'.str_replace('\\', '/', $className).'.php';
		}
	});

	$_SESSION['base_url'] = "http://localhost/cybercom/Ecommerce_website";

	$router = new Core\Router();
	// echo $_SERVER['QUERY_STRING'];
	// $router->add('admin/{controller}');
	// $router->add('',['controller' => 'Admin','action' => 'login']);
	$router->add('{controller}/{action}');
	$router->add('{controller}/{id:\d+}/{action}');
	$router->add('admin/{controller}/{action}',['namespace'=>'Admin']);
	$router->add('admin/{controller}/{action}/{id:\d+}',['namespace'=>'Admin']);
	

	$router->dispatch($_SERVER['QUERY_STRING']);


	// $router->add('',['controller'=>'products','action'=>'index']);
?>