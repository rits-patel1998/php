<?php
namespace App\Controllers\mvc;

use App\Models\Categories;
use \Core\View;
use \Core\Model;
use PDO;
class category extends \Core\Controller{
	
	public function index(){
		echo "<h3>Index Page</h3>";
		// View::renderTemplate('catrgory/category_url.html');

	}
	public function view(){
		// echo "<h3>View Page</h3>";
		$url_key = $this->route_params['parameter'];
		$arrParent = $this->getCategories();
			
		// 'base_url' => $_SESSION['base_url']	
		$products = Categories::getProducts($url_key);
		// echo "<pre>";
		// print_r($products);
		// echo "</pre>";
		// die();
		View::renderTemplate('catrgory/products.html',[

			'url_key' => $url_key,
			'arrParent' => $arrParent,
			'products' => $products,
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