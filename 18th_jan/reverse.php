<?php

	if (isset($_POST['name'])  && (!empty($_POST['name']))) {
		 $num=$_POST['name'];
		 echo "$num<br>";
		 $rnum=0;
		 while ($num>0) {
		 		$rem=$num%10;
		 		echo "rem is: $rem  ";
				$num=(int)($num/10);
				echo "Number is: $num<br>";
				$rnum=$rnum*10+$rem;
		 }
		 echo "Reverse no is: $rnum";
	}

?>

<form action="reverse.php" method="POST">
	
	Enter No: <input type="text" name="name"><br>
	<input type="submit" name="submit" value="submit">

</form>                      