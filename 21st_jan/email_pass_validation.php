<?php

	@$email=$_POST['email'];
	@$password=$_POST['password'];

	if (isset($email) ) {
		if ((!empty($email))  && (!empty($email))) {
		
			echo $email.'<br>';
			
			if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
				echo "<h3>Email is valid<br></h3>";
			}
			else{
				echo "Invalid email id<br>";
			}

		// 	$at=0;
		// 	$find='@';
		// 	$offset=0;
		// 	$dot=0;
		// 	$position=0;
		// 	$pos=0;

		// 	while ($position=strpos($email, $find,$offset)) {
		// 		echo '<strong>@ found at..'.$position.' position<br></strong>';
		// 		$at++;
				
		// 		$offset=$position+1;

		// 	}
		// 	while ( $pos=strpos($email, ".",$offset)) {
		// 		echo '<strong>dot found at '.$pos.' position<br></strong>';
		// 		$dot++;

		// 		$offset=$pos+1;

		// 	}
		// 	// echo " <strong>dot is: $dot<br></strong>";
		// 	// echo '<strong>at is: '.$at.'<br></strong>';
				
		
		// 	if ($at==1  && $dot==1) {
		// 		echo "<h3>Email is valid</h3>";
		// 	}
		// 	else{
		// 		echo "<h3>Invalid email id...dot and @ must be only one</h3>";
		// 	}
		
		}	
	}
	
  
?>

<html>

	<form action="email_pass_validation.php" method="POST">
		
		Email : <input type="text" name="email"><br><br>
		Password : <input type="text" name="password"><br><br>
		<input type="submit" name="submit" value="Login">

	</form>
</html>