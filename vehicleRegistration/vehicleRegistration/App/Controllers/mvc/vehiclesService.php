<?php
namespace App\Controllers\mvc;
use App\Models\VehicleService;
use \Core\View;
use \Core\Model;
use PDO;



class VehiclesService extends \Core\Controller{
	

    protected function getserviceCleanArray($data,$user_id){

        echo $timeSlot = VehicleService::getSlot($data['timeSlot'],$data['date']);
        // die();
        if ($timeSlot == 0) {
           throw new \Exception("Slot Not available..Please select the different One");
        }
        else{
           $slot = $timeSlot; 
            
        }
        $serviceArr = array( 
            "user_id" => $user_id,
            "title" => $data['title'],
            "vehicle_no" =>$data['vehicleNo'],
            "user_licence_no" => $data['licenceNo'],
            "date" => $data['date'],
            "time_slot" => $slot,
            "vehicle_issue" => $data['vehicleIssue'],
            "service_center" => $data['serviceCenter']
            
        );
        // print_r($userArr);
        // die();
        return $serviceArr;
       
    }


	protected function getArray($postData,$user_id){

        $serviceCleanArray = $this->getserviceCleanArray($postData,$user_id);
        // echo "<pre>";
        // print_r( $serviceCleanArray);
        // echo "</pre>";

        if (VehicleService::insert('vehicle_service',$serviceCleanArray)) {
            return true;
           // return 1;
           // $this->showCategory();
        }
        else{
        	// echo "Error in insert";
        	return false;
        }


    }

    public function addService(){

        if (isset($_POST['serviceRegister'])) {
            // echo"<pre>";
            // print_r($_POST);
            // echo"<pre>";
            // die();

            $user_id = $_SESSION['user_id'];

             
             if ($this->getArray($_POST,$user_id)) {
                echo "Record inserted";

                $user_id = $_SESSION['user_id'];
                // View::renderTemplate('vehicleService/showService.html',[
                //    'user_id' => $user_id
                // ]);
                $this->showService();
              }
             else{
                 throw new \Exception("Error in insert");

             }

    
            
        }
        else{
            $user_id = $_SESSION['user_id'];
            View::renderTemplate('vehicleService/serviceRegistration.html',[
               'user_id' => $user_id
            ]);
        }
        
    }

    public function showService(){
        echo $user_id = $_SESSION['user_id'];
        $serviceData = VehicleService::getAll($user_id);
        // echo "<pre>";
        // print_r($serviceData);
        // echo "<pre>";
        View::renderTemplate('vehicleService/showService.html',[
          'user_id' => $user_id,
          'serviceData' =>  $serviceData
       ]);
        
    }
	public function addNew(){

		if (isset($_POST['register'])) {
			// echo"<pre>";
			// print_r($_POST['user']);
			// echo"<pre>";
			// die();]

            $user_id = $_SESSION['user_id'];
            View::renderTemplate('vehicleService/serviceRegistration.html',[
               'user_id' => $user_id
            ]);
    
			
		}
        else{
            View::renderTemplate('vehicleService/serviceRegister.html');
        }
		
	}

    

}
?>