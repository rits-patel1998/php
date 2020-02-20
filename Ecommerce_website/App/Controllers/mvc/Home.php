<?php
	namespace App\Controllers\mvc;
	// use App\Models\;
	use \Core\View;
	use \Core\Model;
	use PDO;


	
	class Home extends \Core\Controller{
		// public function __

		public function login(){
			View::renderTemplate('Home/login.html');
		}
		public function index(){
			$arrParent = $this->getCategories();
			$cmsPages = $this->getCMSPages();
			// echo"<pre>";
			// print_r($arrParent);
			// echo"</pre>";
			View::renderTemplate('Home/home.html',[

				'arrParent' => $arrParent,
				'base_url' => $_SESSION['base_url'],
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

		protected function getSingleCMSPages($url_key){
			$db = model::getDB();
				// echo "6666666666666666";
				
			$selectcmsData = "SELECT * from cms_pages where url_key = '$url_key'";
			
			$stmt = $db->query($selectcmsData);

			$cmsData = $stmt->fetchAll(PDO::FETCH_ASSOC);	
			// echo"<pre>";
			// print_r($cmsData);
			// echo"</pre>";
			// die();
			return $cmsData;
		}
		public function cms(){
			$arrParent = $this->getCategories();
			$url_key = $this->route_params['parameter'];
			// die();
			$pageData = $this->getSingleCMSPages($url_key);

			View::renderTemplate('Home/cmsPage.html',[

				'arrParent' => $arrParent,
				'base_url' => $_SESSION['base_url'],
				'cmsPages' => $pageData
			]);
		}
	}

?>	