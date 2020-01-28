<?php
    session_start();
    
    if (isset($_POST['start_month']) && isset($_POST['year']) && 
        isset($_POST['end_month'])) {

        $start_month = $_POST['start_month'];
        $year = $_POST['year'];
        
        $end_month = $_POST['end_month'];
        // $end_year = $_POST['end_year'];
        // $_SESSION['month']=$_POST['month'];
        // $_SESSION['year']=$_POST['year'];    

        function showCalender( $start_month , $year,  $end_month){
           
            for ($month = $start_month; $month < $end_month; $month++) { 
                showMonthCal($month,$year);
            }
        }


        function showMonthCal($month,$year){
            echo "calender of $month-$year<br>";
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
                if ($d == 1 ) {
                    $flag = false;
                    $First_day = date('D',strtotime($year."-".$month."-".$d));
                }
                if ($d == 1 && $flag == false) {
                    $weekday = date('w', $time);
                    if (date('D', $time) == $First_day) {
                        if ($d % 7 == 0) {
                        echo "<tr>";
                        echo "<td>".date('d D', $time)."</td>";
                        $flag == true;
                    }
                    else{
                        for ($i = 0; $i < $weekday; $i++) { 
                            echo "<td></td>";
                        }
                        echo "<td>".date('d D', $time)."</td>";
                        $flag == true;
                    }
                } 
                else {
                    echo"<td></td>";
                }
                }
                else{
                    if (date('m', $time) == $month)
                    {
                        if (date('D', $time) == 'Sun') {
                            echo "<tr>";
                            echo "<td>".date(' d D ', $time)."</td>";
                        }
                        else{
                            echo "<td>".date(' d D ', $time)."</td>";
                        }
                    } 
                }
                            
            }
            echo "</tr></table>";       
        }
    
        showCalender( $start_month,$year, $end_month );
        
    }
    else{
        echo 'in session';

        // echo $_SESSION['month'];
        // echo $_SESSION['year'];
    }
?>
    <br>
    <br>
    <hr><br>
    <br><br>
    <br>
    <form method="POST" action="calYear.php">
       <!-- Year : <input type="no" name="year"><br><br> -->
       Start Month : <select name="start_month">
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
        
       End Month : <select name="end_month">
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
        <!-- End Year : <input type="no" name="end_year"><br><br> -->
        Enter Year : <input type="no" name="year"><br><br>
        
        <input type="submit" name="submit" value="show calender">   
    </form>