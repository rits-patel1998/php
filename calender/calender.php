<!DOCTYPE html>

<?php
    session_start();
    
    if (isset($_POST['month']) && isset($_POST['year'])) {
        $month = $_POST['month'];
        $year = $_POST['year'];
        echo 'calender of  '.$_SESSION['month']=$_POST['month'].'-'.$_SESSION['year']=$_POST['year'];    

        function showCalender( $month, $year){
            echo "<table border='1' >";
            echo "<tr bgcolor='aqua'>";
                echo "<th>Sun</th>";
                echo "<th>Mon</th>";
                echo "<th>Tues</th>";
                echo "<th>Wed</th>";
                echo "<th>Thu</th>";
                echo "<th>Fri</th>";
                echo "<th>Sat</th>";
            echo "</tr>";
           
            $startday = date('d',mktime(0, 0, 0, $month, 1, $year));
            for($d = 1; $d <= date('t',mktime(0, 0, 0, $month, 1, $year)); $d++)
            {
                $time = mktime(12, 0, 0, $month, $d, $year);  

                if ($d == 1) {
                	echo 'weekday : '.$weekday = date('w', $time);
                	$flag=false;
                		
                }
                 
                if ($flag == false && $d == 1) {
                	if ($d % 7 == 0) {
	                    echo "<tr>";
	                    echo "<td>".date(' d D ', $time)."</td>";
                    }
                    else{
                    	for ($i=0; $i < $weekday; $i++) { 
                    		echo "<td></td>";
                    	}
                        echo "<td>".date(' d D ', $time)."</td>";
                        $flag = true;
                    }
                
                }

                else{
                	if (date('D', $time) == 'Sun') {
	                    echo "<tr>";
	                    echo "<td>".date(' d D ', $time)."</td>";
                    }
                    else{
                    	echo "<td>".date(' d D ', $time)."</td>";
                    }
                
                }
                    
            }
            
            echo "</tr></table>";
        
        }
        showCalender($month, $year);
      
    }
    else{
        echo $_SESSION['month'].'-'.$_SESSION['year'];
    }
?>

    <hr>
    <html>
        <body>
            <form method="POST" action="calender.php">
            <!-- Year : <input type="no" name="year"><br><br> -->
                Month : <select name="month">
                    <option>Select Month</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                </select><br><br>
                Year : <input type="no" name="year"><br><br>
                
                <input type="submit" name="submit" value="show calender">   
            </form>
        </body>
    </html>