
<?php

echo "<table border='1'>";
       for ($i = 1; $i <= 8 ; $i++) { 
           echo "<tr>"; 
                for ($j = 1; $j <= 8; $j++) { 
                    if ($i % 2 == 0) {
                        if ($j % 2 == 0) {
                            echo"<td height='15px' width='15px' bgcolor='black'></td>";
                        }
                        else{
                            echo"<td height='15px' width='15px' bgcolor='white'></td>";
                        }
                    }
                    else{
                        if ($j % 2 != 0) {
                            echo"<td height='15px' width='15px' bgcolor='black'></td>";
                        }
                        else{
                            echo"<td height='15px' width='15px' bgcolor='white'></td>";
                        }
                    }
                   


                   
                }
           
           echo "</tr>";
        }

echo "</table>";
?>  