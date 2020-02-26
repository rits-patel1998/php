<?php

	// require_once "userRegistrationForm.php";
	require_once "Adapter.php";

	if (isset($_POST['register'])) {
		print_r($_POST);

		$userArr = getUserCleanArray($_POST);
		// $userImplodedArray = 
		// print_r($userArr);
		 
	    $arrfieldname = implode(",",array_keys($userArr)); 
	    $arrValue = "'".implode("','",$userArr)."'";

	    print_r($arrValue);
	    $adapter = new Adapter();
	    $set = $adapter->setConfig($config);
		$adapter->insert("INSERT INTO `user` ($arrfieldname) VALUES ($arrValue)");
		
		$adapter->showAll("SELECT * FROM `user`");


	}

	function getUserCleanArray($userData){
		$userArr = array( 
		   	"firstname" => $userData['firstname'],
		    "lastname" => $userData['lastname'],
		    "email" => $userData['email'],
			"password" => $userData['password'],
		    "phoneno" => $userData['phoneno']
		);
	    return $userArr;
	}
?>		