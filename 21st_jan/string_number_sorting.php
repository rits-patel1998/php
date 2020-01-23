<?php

	$numbers=array(1,11,22,33,44,100,112,10,15,66,61,14,20,21,24);
	
	$str=array('1','11','22','33','44','100','10','15','66','61','14','20','21','24');
		// $numbers=array(1,2,5,4,6);

	sort($numbers);
	print_r($numbers);
	echo "<br><br>";

	sort($str,SORT_STRING);	
	print_r($str);
?>