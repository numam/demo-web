<?php
$rows = 5;

for($i = $rows; $i >= 1; $i--) {
    // Print spaces
    for($j = $rows; $j > $i; $j--) {
        echo " ";
    }
    // Print stars
    for($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "\n";
}
?>
