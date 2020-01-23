
<?php

echo "<table border='1'>";
       for ($i = 1; $i <= 6 ; $i++) { 
           echo "<tr>"; 
                for ($j = 1; $j <= 5; $j++) { 
                    
                    echo"<td height='5px' width='80px' >$i * $j = ".((int)($i) * (int)($j))."</td>";
                }
           
           echo "</tr>";
        }

echo "</table>";
?>  