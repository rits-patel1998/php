<?php


namespace Core;

class Router{

	protected $routes = [];
	protected $params = [];


	public function add($route,$params=[]){

		$route = preg_replace('/\//', '\\/', $route);
		$route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);
		$route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
		

			// echo htmlentities($route);
		$route = "/^".$route."$/i";

		$this->routes[$route] = $params;
	}

	protected function match_urls($url){
		foreach ($this->routes as $route => $params) {
			if (preg_match($route, $url , $matches)) {
					// $params = [];
					
				foreach ($matches as $key => $value) {
					if (is_string($key)) {
							// echo $value;
						$params[$key] = $value;
					}
				}
				$this->params =  $params;
				return true;
			}
		}
		return false;
	} 
		
	public function dispatch($url){
			
		$url = $this->removeQueryString($url);
		// echo $url;
		if ($this->match_urls($url)) {

			$controller = $this->params['controller'];
			$controller = $this->convetToStudlyCaps($controller);
			// $controller = "App\Controllers\\$controller";
			$controller = $this->getNamespace().$controller;
			// die();
			// echo $controller;
			// echo "<hr>";
			if (class_exists($controller)) {
				// echo "<pre>";
				// print_r($this->params);
				// echo "</pre>";
				// die();
				$postObj = new $controller($this->params);
				$action = $this->params['action'];
				$action = $this->convetToCamelCase($action);
				if (is_callable([$postObj,$action])) {
					$postObj->$action();
				}	
				else{
					echo "$action is not of $controller class";
					// throw new \Exception("$action is not found in $controller class");
					
				}				
			}
			else{

				echo "$controller class not found";
				// throw new \Exception("$controller class not found");
					
			}
		}
		else{
			echo "No route matched";
			// throw new \Exception("No route matched",404);
				
		}
	}

	protected function convetToStudlyCaps($string){
		return str_replace(' ','', ucwords(str_replace('-',' ', $string)));
	}

	protected function convetToCamelCase($string){
		return lcfirst($this->convetToStudlyCaps($string));
	}

	protected function removeQueryString($url){
		if ($url != '') {
			$data = explode('&', $url,2);
			if (strpos($data[0], '=') === false) {
				$url = $data[0];
			}
			else{
				$url = '';
			}
		}

		return $url;
	}

	protected function getNamespace(){
		$namespace = 'App\Controllers\\';
		if (array_key_exists('namespace', $this->params)) {
			$namespace .= $this->params['namespace'].'\\';
		}
		return $namespace; 
	} 

	public function getRoutes(){
		return $this->routes;
	}


	public function getParams(){
		return $this->params;
	}
}

?>