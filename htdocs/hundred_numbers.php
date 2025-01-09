<?php
function get_prime_mapping_from_range($range) {
    $prime_map = array_fill(0, $range + 1, true);
    $prime_map[0] = $prime_map[1] = false;
    // Sieve of Eratosthenes
    for ($i = 2; $i*$i <= $range; $i++) {
        if ($prime_map[$i]) {
            for ($j = $i*$i; $j <= $range; $j += $i) {
                $prime_map[$j] = false;
            }
        }
    }
    return $prime_map;
}

function create_table($x, $y){
    $prime_mapping = get_prime_mapping_from_range($x * $y);
    $result = "";
    for ($i=1; $i<=$x*$y; $i++ ){
        $color = "white";
        if ($prime_mapping[$i]){
            $color = "yellow";
        }
        $result .= "<td style='border-style:solid; background-color:$color; width: 40px; height: 40px'>$i</td>";
        if (($i % $x) == 0 ){
            $result .= "</tr><tr>";
        }
    }
    return $result;
}

$row_size = 10;
$col_size = 10;
echo "<table><tr>";
echo create_table($row_size, $col_size);
echo "<tr></table>";
