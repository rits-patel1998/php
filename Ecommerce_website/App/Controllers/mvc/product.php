<?php

namespace App\Controllers\mvc;

use App\Models\Categories;
use \Core\View;
use \Core\Model;
use PDO;

class product extends \Core\Controller{

	public function view(){
		$url_key = $this->route_params['parameter'];
		$products = $this->getSingleProduct($url_key);
		$cmsPages = $this->getCMSPages();
		// echo "<pre>";
  //     	print_r($products);
  //     	echo "</pre>";
      	$arrParent = $this->getCategories();
      	// echo $_SESSION['user_id'];
      	// die();
		View::renderTemplate('product/showSingleProduct.html',[

			'url_key' => $url_key,
			'userid' =>$_SESSION['user_id'],
			'products' => $products,
			'base_url' => $_SESSION['base_url'],
			'arrParent' => $arrParent,
			'cmsPages' => $cmsPages
		]);	
	}

	protected function getCMSPages(){
			$db = model::getDB();
				// echo "6666666666666666";
				
			$selectcmsData = "SELECT * from cms_pages";
			$stmt = $db->query($selectcmsData);

			$cmsData = $stmt->fetchAll(PDO::FETCH_ASSOC);	
			// echo"<pre>";
			// print_r($cmsData);
			// echo"</pre>";
			// die();
			return $cmsData;
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