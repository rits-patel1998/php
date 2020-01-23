<?php

	// @mysqli_connect('localhost','roo','') or exit("Not connected");
	// echo "Connected";

// =================================================================

	// $filename = 'C:\xampp\htdocs\php_practice_cc\1st/count.txt';
	// $file = fopen($filename, 'r')
    // or exit("unable to open file ($filename)");
	
	// echo"<br>printing something after die calling";

// ===========================================================

class A{
	public function __destruct(){
		echo "from A";
		
	}
	
}
class B{
	public function __destruct(){
		echo "from B";
		exit();
	}
	
}

$a=new A;
$b=new B;

echo "something Typing...";
exit();


?>