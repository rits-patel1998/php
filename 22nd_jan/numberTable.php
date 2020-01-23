
<?php

echo "<table border='1'>";
      
       for ($i = 1; $i <= 10 ; $i++) { 
            echo "<tr>"; 
                for ($j = 1; $j <= 10; $j++) { 
                    
                    echo"<td height='5px' width='5px' >".((int)($i) * (int)($j))."</td>";
                }
           
            echo "</tr>";
        }

echo "</table>";
?>  