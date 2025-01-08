<?php
$row_size = 10;
$col_size = 10;
echo "<table>";
echo "<tr>";

function get_prime_mapping_from_range($max) {
    $prime_map = array_fill(0, $max + 1, true);
    $prime_map[0] = $prime_map[1] = false;
    // Sieve of Eratosthenes
    for ($i = 2; $i*$i <= $max; $i++) {
        if ($prime_map[$i]) {
            for ($j = $i*$i; $j <= $max; $j += $i) {
                $prime_map[$j] = false;
            }
        }
    }
    return $prime_map;
}

$prime_mapping = get_prime_mapping_from_range($row_size * $col_size);
for ($i=1; $i<=$row_size*$col_size; $i++ ){
    $color = "white";
    if ($prime_mapping[$i]){
        $color = "yellow";
    }
    echo "<td style='border-style:solid; background-color:$color; width: 40px; height: 40px'>$i</td>";
    if (($i % $row_size) == 0 ){
        echo "</tr>";
        echo "<tr>";
    }
}
echo "<tr>";
echo "</table>";