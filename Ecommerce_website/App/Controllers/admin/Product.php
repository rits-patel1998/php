<?php
namespace App\Controllers\admin;
use \Core\View;
use \App\Models\products;
use \Core\Model;
use PDO;

class Product extends \Core\Controller{
	public function showProductAction(){
		// echo "<h3>show product from product Controller</h3>";
		$showData = products::getAll();
		View::renderTemplate('product/showProduct.html',[
				'showData' => $showData
		]);
	}


	protected function getProductCleanArray($productData,$filename=""){
        $productArr = array( 
            "product_name" => $productData['category_name'],
            "SKU" => $productData['sku'],
            "url_key" =>$productData['url_key'],//$categoryData[''],
            "image" => $filename,
            "status" => $productData['status'],
            "description" => $productData['description'],
			"short_description" =>$productData['short_description'],
            "price" => $productData['price'],
			"stock" => $productData['stock']
           
        );
        return $productArr;
       
    }

	protected function getArray($postData,$filename){
		
        $productCleanArray = $this->getProductCleanArray($postData,$filename);
        if ($last_id = products::insert('product',$productCleanArray)) {
           	echo "Record Inserted=========";
           	// $this->showProduct();
           	echo $last_id;
           	echo sizeof($postData['category_id']);
           	echo "<pre>";
			print_r($postData['category_id']);
			echo "</pre>";
           		// die();
           	for ($i=0; $i < sizeof($postData['category_id']); $i++) { 
           		$prod_cat =[
           			"product_id" => $last_id,
           			"category_id" => $postData['category_id'][$i]
        		];
           		products::insert('product_category',$prod_cat);
           	}
           	 $this->showProduct();
        }
        else{
        	echo "Error in insert";
        }


    }

	public function addProduct(){

		if (isset($_POST['addProduct'])) {
			// echo "<pre>";
			// print_r($_POST);
			// echo "</pre>";
			
			$filename = $_FILES['file']['name'];
    		$tmp_name = $_FILES['file']['tmp_name'];	

    		if (isset($filename)) {
		        if (!empty($filename)) {
		            // echo $filename;

		            $location = '../Resources/category_photos';
		            if ( move_uploaded_file($tmp_name, $location .$filename)) {
		            	 $filename = $filename;
		            }
		            else {
		                echo "Something went wrong";
		            }
		           
		        }
		        else{
		            echo "choose file first";
		        }
		    }
			$this->getArray($_POST,$filename);
		}
		else{

			$db = model::getDB();
			$categoryData = $this->selectCategory();
			View::renderTemplate('product/addProduct.html',[
				'categoryData'=> $categoryData

			]);
		}
	}

	protected function selectCategory(){
		$db = model::getDB();
		$selectcategory = "SELECT category_id,category_name from category";
		$stmt = $db->query($selectcategory);
		$categoryData = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $categoryData;
	}

	public function delete(){
		$product_id = $this->route_params['id'];
		
		$flag = products::delete('product',"product_id = $product_id");
		if ($flag == 1) {
			$redirect = $_SESSION['base_url']."/public/admin/product/showProduct";
		                	header("Location:$redirect ");
		}
	}


	protected function getUPProductCleanArray($ProductData,$filename){
    	$productArr = array( 
	       	"product_name" => $ProductData['product_name'],
            "SKU" => $ProductData['sku'],
            "url_key" => $ProductData['url_key'],
            "image" =>$filename,//$categoryData[''],
            "status" => $ProductData['status'],
            "description" => $ProductData['description'],
            "short_description" => $ProductData['short_description'],
            "price" => $ProductData['price'],
            "stock" => $ProductData['stock'],
            "updated_at" => date('Y-m-d H:i:s')
		);
		return $productArr;
   
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

    protected function deleteProduct(){
    	$product_id = $this->route_params['id'];
		
		$flag = products::delete('product_category',"product_id = $product_id");
		if ($flag == 1) {
			$redirect = $_SESSION['base_url']."/public/admin/product/showProduct";
		                	header("Location:$redirect ");
		}
    }
	public function edit(){
		
		if (isset($_POST['updateProduct'])) {
			echo "<pre>";
			print_r($_POST);
			echo "</pre>";

			$filename = $_FILES['file']['name'];
    		$tmp_name = $_FILES['file']['tmp_name'];	

    		if (isset($filename)) {
		        if (!empty($filename)) {
		            // echo $filename;

		            $location = '../Resources/category_photos';
		            if ( move_uploaded_file($tmp_name, $location .$filename)) {
		            	 $filename = $filename;
		            }
		            else {
		                echo "Something went wrong";
		            }
		           
		        }
		        else{
		            echo "choose file first";
		        }
		    }
			$product_id = $this->route_params['id'];
			$productCleanArray = $this->getUpProductCleanArray($_POST,$filename); 

		    $productPreparedArray =  $this->prepareArr($productCleanArray);
    		echo $stmt = products::update('product',$productPreparedArray,"product_id = $product_id"); 

		    if ($stmt == 1) {
		    	echo "<pre>";
		    	print_r($_POST['category_id']);
		    	echo "</pre>";
		    	// die();
		    	$this->deleteProduct($product_id);
				for ($i=0; $i < sizeof($_POST['category_id']); $i++) { 
           			$prod_cat =[
           				"product_id" => $product_id,
           				"category_id" => $_POST['category_id'][$i]
        			];
           			products::insert('product_category',$prod_cat);
           		}
				echo "record updated";
			    
			    $redirect = $_SESSION['base_url']."/public/admin/product/showProduct";
		        header("Location:$redirect ");
		    }
		    else{
		        echo "Error in Update";
	        }

		}
		else{

			$product_id = $this->route_params['id'];
			$selectdata = "SELECT * from product where product_id = '$product_id'";
			
			// $showData = Categories::getAll();
			$db = model::getDB();
			$stmt = $db->query($selectdata);
			$showData = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
				
			$selectcategory = "SELECT category_id,category_name from category";
			$stmt = $db->query($selectcategory);
			$categoryData = $stmt->fetchAll(PDO::FETCH_ASSOC);	
			
			// $selectStatus = "SELECT status from product";	
			// $stmt = $db->query($selectStatus);
			// $statusData = $stmt->fetchAll(PDO::FETCH_ASSOC);


			// print_r($categoryData);
			// die();
			View::renderTemplate('product/updateProduct.html',[
					'showData' => $showData,
					'categoryData' => $categoryData
					// 'statusData' => $statusData
			]);
		}
	}

}

?>