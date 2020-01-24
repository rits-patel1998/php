<?php

	if (isset($_POST['name'])  && (!empty($_POST['name']))) {
		 $text = $_POST['name'];
         $find = ['ritu','abc','vir'];
         $replace = ['ritu***' , 'vir**'];
         
         $new_string = str_ireplace($find,$replace, $text);
         echo $new_string;
	}

?>

<form action="find_replace.php" method="POST">
	
	Enter No: <input type="text" name="name"><br>
	<input type="submit" name="submit" value="submit">

</form>                      