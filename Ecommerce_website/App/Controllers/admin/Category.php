<?php
namespace App\Controllers\admin;
use App\Models\Categories;
use \Core\View;
use \Core\Model;
use PDO;

class Category extends \Core\Controller{
	

	public function showCategory(){
		$showData = Categories::getAll();
		
		View::renderTemplate('catrgory/showCategory.html',[
				'showData' => $showData
		]);
	}

	protected function getCategoryCleanArray($categoryData,$filename){
        $categoryArr = array( 
            "category_name" => $categoryData['category_name'],
            "url_key" => $this->generateUrlKey($categoryData['url_key']),
            "image" =>$filename,//$categoryData[''],
            "status" => $categoryData['status'],
            "description" => $categoryData['description'],
           
        );
        if ( $categoryData['parent_category'] != "null") {
        	 $categoryArr["parent_category"] =  $categoryData['parent_category'];
        }
        return $categoryArr;
       
    }
    
	protected function getArray($postData,$filename){
		
        $categoryCleanArray = $this->getCategoryCleanArray($postData,$filename);
        if (Categories::insert('category',$categoryCleanArray)) {
           echo "Record Inserted=========";
           $this->showCategory();
        }
        else{
        	echo "Error in insert";
        }


    }

	public function addCategory(){
		if (isset($_POST['addCategory'])) {
			$filename = $_FILES['file']['name'];
    		$tmp_name = $_FILES['file']['tmp_name'];	

    		if (isset($filename)) {
		        if (!empty($filename)) {
		            // echo $filename;

		            $location = '../Resources/';
		            if ( move_uploaded_file($tmp_name, $location .$filename)) {
		            	 $filename = $filename;
		                // echo "uploaded";
						// die();	

						$this->getArray($_POST,$filename);                
		            }
		            else {
		                echo "Something went wrong";
		            }
		           
		        }
		        else{
		            echo "choose file first";
		        }
		    }
			

		}
		else{
			$db = model::getDB();
			// echo "6666666666666666";
			
			$selectcategory = "SELECT category_id,category_name from category";
			$stmt = $db->query($selectcategory);
			$categoryData = $stmt->fetchAll(PDO::FETCH_ASSOC);	
			
			View::renderTemplate('catrgory/addCategory.html',[
					'categoryData' => $categoryData
			]);
		}
	}


	

	public function delete(){
		$category_id = $this->route_params['id'];
		$flag = Categories::delete('category',"category_id = $category_id");
		if ($flag == 1) {
			$redirect = $_SESSION['base_url']."/public/admin/category/showCategory";
		                	header("Location:$redirect ");
		}
	}

	protected function getCatgoryCleanArray($categoryData,$filename){
    	$categoryArr = array( 
	       "category_name" => $categoryData['category_name'],
            "url_key" => $categoryData['url_key'],
            "image" =>$filename,//$categoryData[''],
            "status" => $categoryData['status'],
            "description" => $categoryData['description'],
            "parent_category" => $categoryData['parent_category'],
            "updated_at" =>  date('Y-m-d H:i:s')
		);
		return $categoryArr;
   
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

	public function edit(){
		if (isset($_POST['updateCategory'])) {
			$category_id = $this->route_params['id'];
			// extract($_POST);

			$filename = $_FILES['file']['name'];
    		$tmp_name = $_FILES['file']['tmp_name'];	

    		if (isset($filename)) {
		        if (!empty($filename)) {
		            // echo $filename;

		            $location = '../Resources/';
		            if ( move_uploaded_file($tmp_name, $location .$filename)) {
		            	$filename = $filename;
		                // echo "uploaded";
		                $categoryCleanArray = $this->getCatgoryCleanArray($_POST,$filename); 

		                $categoryPreparedArray =  $this->prepareArr($categoryCleanArray);
    					$stmt = Categories::update('category',$categoryPreparedArray,"category_id = $category_id"); 
		                if ($stmt == 1) {
		                	echo "record updated";
		                	// $this->showCategory();
		                	$redirect = $_SESSION['base_url']."/public/admin/category/showCategory";
		                	header("Location:$redirect ");
		                }
		                else{
		                	echo "Error in Update";
		                }
		            }
		            else {
		                echo "Something went wrong";
		            }
		           
		        }
		        else{
		            echo "choose file first";
		        }
		    }
			$url_key = $this->generateUrlKey($url_key);

		}
		else{
			echo $category_id = $this->route_params['id'];
			echo $selectdata = "SELECT category_name,url_key,image,status,description from category where category_id = '$category_id'";

			// $showData = Categories::getAll();
			$db = model::getDB();
			$stmt = $db->query($selectdata);
			$showData = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
				
			$selectcategory = "SELECT category_id,category_name from category";
			$stmt = $db->query($selectcategory);
			$categoryData = $stmt->fetchAll(PDO::FETCH_ASSOC);	
				
			// print_r($categoryData);
			// die();
			View::renderTemplate('catrgory/updateCategory.html',[
					'showData' => $showData,
					'categoryData' => $categoryData
			]);
		}
		

	}

	protected function generateUrlKey($url_key){
		// echo "<hr>".$url_key;
		$selectUrl = "SELECT category_id,category_name,url_key from category where url_key = '$url_key'";
		$db = model::getDB();
		$stmt = $db->query($selectUrl);
		// $categoryData = $stmt->fetchAll(PDO::FETCH_ASSOC);	
		echo $stmt->rowCount();
		if ($stmt->rowCount() == 0) {
			return $url_key;
		}
		else{
			// echo "<h3>Enter unique Url Key</h3>";
			throw new \Exception("Enter unique Url Key");
			
			// $selectcategory = "SELECT category_id,category_name from category where parent_category = 0";
			// $stmt = $db->query($selectcategory);
			// $categoryData = $stmt->fetchAll(PDO::FETCH_ASSOC);	
			View::renderTemplate('catrgory/addCategory.html',[
					'categoryData' => $categoryData
			]);
		}
	}


}

?>