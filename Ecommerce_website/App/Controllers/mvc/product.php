<?php

namespace App\Controllers\mvc;

use App\Models\Categories;
use \Core\View;
use \Core\Model;
use PDO;

class product extends \Core\Controller{

	public function view(){
		echo $url_key = $this->route_params['parameter'];
		$products = $this->getSingleProduct($url_key);
		// echo "<pre>";
  //     	print_r($products);
  //     	echo "</pre>";
      	$arrParent = $this->getCategories();
		View::renderTemplate('product/showSingleProduct.html',[

			'url_key' => $url_key,
			
			'products' => $products,
			'base_url' => $_SESSION['base_url'],
			'arrParent' => $arrParent

		]);	
	}


	protected function getSingleProduct($url_key){
		$db = model::getDB();
        $stmt = $db->query("SELECT 
                            p.*
                            from product p 
                            WHERE p.url_key = '$url_key'");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      	
        return $result;
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