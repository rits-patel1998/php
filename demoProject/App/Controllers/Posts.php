<?php

	namespace App\Controllers;
	use Core\View;
	use App\Models\Post;
	class Posts extends \Core\Controller
	{

		public function indexAction(){
			// echo "Index function called";
			// echo "Query String : <pre>".print_r($_GET,true) . "</pre>";
			$postData = Post::getAll();
			View::renderTemplate('Posts/index.html',[
				'postData' => $postData
			]);
		}

		public function addNewAction(){
			View::renderTemplate('Posts/insert.html');
		}

		public function addPostAction(){
			extract($_POST);
			$insert = "INSERT INTO posts(title,content) values ('$title','$content')";

			$stmt = Post::insert($insert);
			if ($stmt) {
				$postData = Post::getAll();
				View::renderTemplate('Posts/index.html',[
					'postData' => $postData
				]);
			}
		}
		public function editAction(){
			echo "<hr>";
			echo "edit from posts conroller";
			echo "Route Parameters : <pre>".print_r($this->route_params,true)."</pre>";
		}

	}

?>