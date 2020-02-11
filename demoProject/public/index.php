<?php

	// require "../App/Controllers/Posts.php";
	// require "../Core/Router.php";
	

	// Twig_Autoloader::register();

	require_once dirname(__DIR__).'/vender/autoload.php';
	

	spl_autoload_register(function ($className){
		$rootDir = dirname(__DIR__);
		$file = $rootDir ."/".str_replace('\\','/', $className).'.php';
		if (is_readable($file)) {
			require $rootDir.'/'.str_replace('\\', '/', $className).'.php';
		}
	});

	$router = new Core\Router();
	// $postObj = new App\Controllers\Posts();

	// $postObj->index()
	// // echo "name of class : ".get_class($router);

	$router->add('',['controller' => 'Home','action' => 'index']);
	// $router->add('admin/posts/abc',['controller' => 'Posts','action' => 'index']);
	// $router->add('posts/new',['controller' => 'Posts','action' => 'new']);
	$router->add('{controller}/{action}');
	$router->add('{controller}/{id:\d+}/{action}');
	$router->add('admin/{controller}/{action}',['namespace'=>'Admin']);
	

	$url = $_SERVER['QUERY_STRING'];
	$urla = $router->get_routes();
	// echo '<pre>';
	// print_r($urla);
	// echo '</pre>';
	
	

	if ($router->match_urls($url)) {
		echo "<pre>";
		var_dump($router->get_params());
		echo "</pre>";
	}
	else{
		echo "Url doesn't match";
	}	

	$router->dispatch($_SERVER['QUERY_STRING']);
?>