<?php
namespace App\Controllers\mvc;
use App\Models\User;
use \Core\View;
use \Core\Model;
use PDO;



class Users extends \Core\Controller{
	public function login(){
		// echo "login called";

		if (isset($_POST['loginButton'])) {
			// print_r($_POST);
			extract($_POST);
			if ($user_id = User::getSingleData($_POST['email'],$_POST['password'])) {
				echo "Login Successfull"; 
				$_SESSION['email'] = $_POST['email'];

				echo $_SESSION['user_id'] = $user_id;
				// die();
				// $base_url = $_SESSION['base_url'];
				View::renderTemplate('vehicleService/serviceRegister.html',[

					'user_id' => $_SESSION['user_id']
				]);

			} 
			else{
				throw new \Exception("Invalid login details");
				
			}



		}
		else{
			// $base_url = $_SESSION['base_url'];
			View::renderTemplate('user/showLoginPage.html');
		}
		
	}
	protected function getUserCleanArray($data){
        $userArr = array( 
            "firstname" => $data['firstname'],
            "lastname" => $data['lastname'],
            "email" =>$data['email'],
            "password" => $data['password'],
            "phoneno" => $data['phoneno'],
           
        );
        // print_r($userArr);
        // die();
        return $userArr;
       
    }

    protected function getAddressCleanArray($data,$last_id){
        $addressArr = array( 
            "user_id" => $last_id,
            "street" => $data['street'],
            "city" =>$data['city'],
            "state" => $data['state'],
            // "zip_code" => $data['zip_code'],
           	"country" => $data['country']
        );
        // print_r($addressArr);
        // die();
        return $addressArr;
       
    }

	protected function getArray($postData){

        $userCleanArray = $this->getUserCleanArray($postData);
        
        if ($last_id = User::insert('user',$userCleanArray)) {
           echo "Record Inserted=========";
            return $last_id;
           // return 1;
           // $this->showCategory();
        }
        else{
        	// echo "Error in insert";
        	return false;
        }


    }
    protected function getAddressArray($postData,$last_id){

        $addressCleanArray = $this->getAddressCleanArray($postData,$last_id);
        
        if (User::insert('user_address',$addressCleanArray)) {
           echo "Record Inserted=========";
           $this->login();

            // View::renderTemplate('user/showLoginPage.html');
           // return 1;
           // $this->showCategory();
        }
        else{
        	// echo "Error in insert";
        	return false;
        }


    }
	public function registerAction(){

		if (isset($_POST['register'])) {
			// echo"<pre>";
			// print_r($_POST['user']);
			// echo"<pre>";
			// die();
			extract($_POST);
			if ($last_id = $this->getArray($_POST['user'])) {
				$this->getAddressArray($_POST['user_add'],$last_id);
			}
			else
			 {
			 	throw new Exception("Error In insert");
			 	
			 }
		}
		else{
			View::renderTemplate('user/showRegisterPage.html');
	
		}
	}


}
?>