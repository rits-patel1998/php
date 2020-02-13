<?php
namespace Core;

class Router{
	protected $routes = [];
	protected $params = [];


	public function add($route, $params=[]){

		$route = preg_replace('/\//', '\\/', $route);
			
		$route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);
		$route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
		$route = '/^'.$route.'$/i';

		$this->routes[$route] = $params;	

	}

	public function match_url($url){
		# $reg = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z]+)$/";	
		// die();
		foreach ($this->routes as $route => $params) {
			
			// echo $url;
			// echo $route;

			if (preg_match($route, $url , $match)) {
				// $this->params = $params;
				// return true;
				// echo "<pre>";
				// print_r($match);
				// echo "</pre>";
				// $params = [];
				foreach ($match as $key => $values) {
					// echo $params;
					if (is_string($key)) {
						$params[$key] = $values;
					}
				}
				$this->params = $params;
				// print_r($this->params);
				return true;
			}
			// else{
			// 	echo "no such url found";
			// }
		}
		return false;
		
	}

	public function dispatch($url){

		$url = $this->removeQueryString($url);		

		if ($this->match_url($url)) {
			echo "<pre>";
			print_r($this->params);
			echo "</pre>";
			$controller = $this->params['controller'];
			$controller = $this->convertStudlyCaps($controller);
			$controller = "App\controller\\$controller";

			// var_dump( class_exists($controller));

			if (class_exists($controller)) {

				$controllerObj = new $controller($this->params);
				$action = $this->params['action'];
				$action = $this->convertCamelCase($action);
				if (is_callable([$controllerObj,$action])) {
					$controllerObj->$action();		
				}			
			}
			else{
				echo " $controller class does not exist";
			}
		}
		// echo "No route matched";
		
	}

	protected function removeQueryString($url){
		if ($url != '') {
			$temp = explode('&', $url,2);
			// print_r($temp);
			if (strpos($temp[0],'=')) {
				$url ="";
			}
			else{
				$url = $temp[0];
			}
			return $url;
		}
		

	}
	protected function convertStudlyCaps($string){
		return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
	}

	protected function convertCamelCase($string){
		return lcfirst($this->convertStudlyCaps($string));
	}

	public function getRoutes(){
		return $this->routes;
	}
	public function getParams(){
		return $this->params;
	}
}

?>