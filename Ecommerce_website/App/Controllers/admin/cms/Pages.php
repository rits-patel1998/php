<?php

namespace App\Controllers\admin\cms;
use \Core\View;
use \Core\model;
use \App\Models\Cmss;
use PDO;


class Pages extends \Core\Controller{



	public function indexAction(){

		$showdata = Cmss::getAll();
		
		$redirect = $_SESSION['base_url'];
		 
		
		View::renderTemplate('CMS/showCmsPages.html',[
			'showdata' => $showdata,
			'url' => $_SESSION['base_url']
		]);
	}


	public function delete(){
		echo $cms_id = $this->route_params['id'];
		
		
		$flag = Cmss::delete('cms_pages',"cms_id = $cms_id");
		if ($flag == 1) {
			echo "deleted";
			$redirect = $_SESSION['base_url']."/public/admin/cms/Pages/index";
		                	header("Location:$redirect ");
		}
	}


	protected function getPageCleanArray($pageData){
        $pageArr = array( 
            "cms_page_title" => $pageData['page_title'],
            "url_key" => $pageData['url_key'],
            "status" => $pageData['status'],
            "content" => $pageData['content'],
           
        );
       
        return $pageArr;
       
    }

	protected function getArray($postData){
		
        $pageCleanArray = $this->getPageCleanArray($postData);
        if (Cmss::insert('cms_pages',$pageCleanArray)) {
           echo "Record Inserted=========";
           $this->indexAction();
        }
        else{
        	echo "Error in insert";
        }


    }

	public function addAction(){
			// echo "Add called";

		if (isset($_POST['addPages'])) {
			echo "<pre>";
			print_r($_POST);
			echo "</pre>";
				
			$this->getArray($_POST);
		}
		else{
			View::renderTemplate('CMS/addCmsPages.html');
		}
	}

	protected function prepareArr($array){
        $arrUser = [];
        $arrUserimploded = [];
        foreach ($array as $key => $value) {
            $strValues = "$key = '$value'";
            array_push( $arrUser,  $strValues );
        }
        
        array_push($arrUserimploded, implode(',',$arrUser));
        return $arrUserimploded;
    }

	// protected function getCatgoryCleanArray($categoryData,$filename){
 //    	$categoryArr = array( 
	//        "category_name" => $categoryData['category_name'],
 //            "url_key" => $categoryData['url_key'],
 //            "image" =>$filename,//$categoryData[''],
 //            "status" => $categoryData['status'],
 //            "description" => $categoryData['description'],
 //            "parent_category" => $categoryData['parent_category'],
 //            "updated_at" =>  date('Y-m-d H:i:s')
	// 	);
	// 	return $categoryArr;
   
	// }


	public function edit(){
		if (isset($_POST['updatePages'])) {
			$cms_id = $this->route_params['id'];
			
			$pageCleanArray = $this->getPageCleanArray($_POST); 
			echo "<pre>";
			print_r($pageCleanArray);
			echo "</pre>";

		    $pagePreparedArray =  $this->prepareArr($pageCleanArray);
   			echo $stmt = Cmss::update('cms_pages',$pagePreparedArray,"cms_id = $cms_id"); 
	        
	        if ($stmt == 1) {
		        echo "record updated";
		                	// $this->showCategory();
		        $redirect = $_SESSION['base_url']."/public/admin/cms/Pages/index";
		        header("Location:$redirect ");										
	        }
		    else{
		        echo "Error in Update";
	        }
		}
		else{
			$cms_id = $this->route_params['id'];
			$selectdata = "SELECT * from cms_pages where cms_id = '$cms_id'";

			// $showData = Categories::getAll();
			$db = model::getDB();
			$stmt = $db->query($selectdata);
			$showData = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			View::renderTemplate('CMS/updateCMSPage.html',[
					'showData' => $showData,
					
			]);
		}
		

	}


}

?>