<?php
$size = 10;
$count = 0;
echo "<table>";
echo "<tr>";
for ($i=1; $i<=$size; $i++ ){
    echo "<td style='border-style:solid; width: 40px; height: 40px'>$count</td>";
    $count += 1;
    if (($i % $size) == 0 && $count < $size*$size){
        echo "</tr>";
        $i = 0;
        echo "<tr>";
    }
}
echo "<tr>";
echo "</table>";