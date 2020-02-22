<?php
namespace App\Controllers;
use App\Models\admin;
use \Core\View;
use \Core\Model;
use PDO;



class admins extends \Core\Controller{
	

    
    public function showService(){
        // echo $user_id = $_SESSION['user_id'];

        $serviceData = Admin::getAllData();
        // echo "<pre>";
        // print_r($serviceData);
        // echo "<pre>";
        View::renderTemplate('admin/show.html',[
          'serviceData' =>  $serviceData
       ]);
        
    }
	

    public function update(){
        if (isset($_POST['serviceUpdate'])) {
            $service_id = $this->route_params['id'];
            extract($_POST);
            // print_r($_POST);
            // die();     
            
            $updateData = Admin::updateStatus( $service_id, $status);  
            if ($updateData == 1) {
                  # code...
                }    
        }

        $service_id = $this->route_params['id'];
        $serviceData = Admin::getSingleData($service_id);

        View::renderTemplate('admin/updateForm.html',[
          'serviceData' =>  $serviceData
       ]);
    }


    

}
?>