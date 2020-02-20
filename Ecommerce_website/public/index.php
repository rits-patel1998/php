<!-- SELECT 
	GROUP_CONCAT(c.category_name) AS Category_name,
    c.url_key,
    p.product_name 
from product p 
LEFT JOIN product_category pc
	ON pc.product_id = p.product_id
LEFT JOIN category c
	ON pc.category_id = c.category_id
WHERE c.url_key = 'electronic'
 GROUP by p.product_name -->

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
	$router->add('',['controller' => 'Admin','action' => 'login']);
	$router->add('admin/cms/{controller}', ['namespace'=>'admin\cms','action'=>'index']);
	$router->add('admin/cms/{controller}/{action}',['namespace'=>'admin\cms']);
	$router->add('admin/cms/{controller}/{action}/{id:\d+}',['namespace'=>'admin\cms']);
	
	$router->add('admin/cms/{controller}/{action}/id/{id:\d+}',['namespace'=>'admin\cms']);
	
	$router->add('mvc/{controller}',['namespace'=>'mvc','action'=>'index']);	
	$router->add('mvc/{controller}/{action}',['namespace'=>'mvc']);
	$router->add('mvc/{controller}/{action}/{parameter:[0-9a-zA-Z\.\_]+}',['namespace'=>'mvc']);
	
	$router->add('{controller}/{action}');
	$router->add('{controller}/{id:\d+}/{action}');
	$router->add('admin/{controller}/{action}',['namespace'=>'admin']);
	
	$router->add('admin/{controller}/{action}/{id:\d+}',['namespace'=>'Admin']);
	

	$router->dispatch($_SERVER['QUERY_STRING']);


	// $router->add('',['controller'=>'products','action'=>'index']);
?>