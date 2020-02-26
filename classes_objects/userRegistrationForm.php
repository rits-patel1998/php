<?php
	require_once "register.php";	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Registration form</h2>

	<div>
		<form action="" method="POST">
			<div>
				<div>
					<label>First name: </label>
				</div>
				<div>
					<input type="text" name="firstname">
				</div>
			</div>
			<div>
				<div>
					<label>Last Name: </label>
				</div>
				<div>
					<input type="text" name="lastname">
				</div>
			</div>
			<div>
				<div>
					<label>Email: </label>
				</div>
				<div>
					<input type="email" name="email">
				</div>
			</div>
			<div>
				<div>
					<label>Password: </label>
				</div>
				<div>
					<input type="password" name="password">
				</div>
			</div>
			<div>
				<div>
					<label>Phone No: </label>
				</div>
				<div>
					<input type="number" name="phoneno">
				</div>
			</div>
			<div>
				<div>
					<input type="submit" name="register" value="Register">
				</div>
			</div>
		</form>		
	</div>
</body>
</html>
