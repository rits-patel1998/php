<?php
namespace App\Controllers;
	use \Core\View;
	session_start();
	class Admin extends \Core\Controller{
		// public function __construct(){
		// 	$this->login();
		// }
		
		public function login(){
			// session_destroy();
			// echo "<br><h3>In show login form from Login controller</h23>";
			// View::renderTemplate('admin/login.html');
			if (isset($_SESSION['username'])) {
				// echo "fgfgfgfgfgfgtf<br>";
				// echo $_SESSION['username'];
				// View::renderTemplate('admin/dashboard.html');
				header("location:http://localhost/cybercom/Ecommerce_website/public/admin/dashboard");
				// $this->dashboard();
			}
			if (isset($_POST['userLogin'])) {
				print_r(extract($_POST));
					// echo "chklogin Called";
					if ($email == 'admin123' && $password == '123') {
						$_SESSION['username'] = $email;
						header("location:http://localhost/cybercom/Ecommerce_website/public/admin/dashboard");
				
						
					}
					else{
						echo "Invalid login details";
						$_SESSION['username'] = "";
						View::renderTemplate('admin/login.html');
					}
			}
			else{
				View::renderTemplate('admin/login.html');
					
			}
			
		} 

		public function dashboard(){
			// echo "dashboard";
			View::renderTemplate('admin/dashboard.html');
		}


		// public function chkLogin(){
		// 	echo "chklogin Called";
		// 	extract($_POST);
		// 	if ($email == 'admin123' && $password == '123') {
		// 		$_SESSION = 'admin123';
		// 		echo "login Successfull";

		// 	}
		// }
	}

?>