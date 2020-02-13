<?php

	// require_once "../Core/Router.php";
	// require_once "../App/Controller/Posts.php";

	// echo dirname(__DIR__) ;
	// die();

	spl_autoload_register(function ($class){
		$root = dirname(__DIR__);
		$root .= '/'.str_replace('\\', '/', $class).'.php';
		// echo $root;
		if (is_readable($root)) {
			require_once "$root";
		}

	});


	$router = new Core\Router();
	// echo get_class($router);

	// $router->add('home/index',['controller' => 'Home','action' => 'index']);
	// $router->add('posts/index',['controller' => 'Posts','action' => 'index']);


	$router->add('{controller}/{action}');
	$router->add('{controller}/{id:\d+}/{action}');
	$router->add('admin/{controller}/{action}',['namespace'=>'Admin']);
	

	 $url = $_SERVER['QUERY_STRING'];

	// if ($router->match_url($url)) {
		
	// 	echo "<pre>";
	// 	print_r($router->getRoutes());
	// 	echo "</pre>";
	
	// // }

	$router->dispatch($url);

	// echo "<hr>";	
 // 	echo "<pre>";
	// print_r($router->getParams());
	// echo "</pre>";
?>