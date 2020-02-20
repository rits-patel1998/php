<?php
	namespace App\Controllers\mvc;
	// use App\Models\;
	use \Core\View;
	use \Core\Model;
	use PDO;


	
	class Home extends \Core\Controller{
		// public function __
		public function index(){
			$arrParent = $this->getCategories();
			// echo"<pre>";
			// print_r($arrParent);
			// echo"</pre>";
			View::renderTemplate('Home/home.html',[

				'arrParent' => $arrParent,
				'base_url' => $_SESSION['base_url']
			]);
		}


		protected function getCategories(){
			$db = model::getDB();
				// echo "6666666666666666";
				
			$selectcategory = "SELECT category_id,category_name,url_key from category where parent_category is NULL";
			$stmt = $db->query($selectcategory);

			$categoryData = $stmt->fetchAll(PDO::FETCH_ASSOC);	
			$arrParent = [];
				// print_r($categoryData);

			foreach ($categoryData as $key) {
				$selectcategory = "SELECT category_id,category_name,url_key from category where parent_category= $key[category_id]";
				$stmt1 = $db->query($selectcategory);

				$categoryChild = $stmt1->fetchAll(PDO::FETCH_ASSOC);
				$key['child'] = $categoryChild;
				array_push($arrParent,$key);  	
			}
			return $arrParent;

		}
	}

?>