<?php
    $time = time();
    echo date('d M Y h :i :s',$time).'<br>';


   echo $updated = date('d M Y h :i :s',strtotime('-1 week 2 days 5 hours')).'<br>';
   
   echo $updated = date('d M Y h :i :s', $time - (5*2*20)).'<br>'; // adding and deleting time like this also

   echo "random number generating : ".rand(1,6).'<br>';
    echo "maximum of random no : ".rand().'/'.getrandmax();


?>