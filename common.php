		<?php
    $a="AMITABH BACHHAN	";
    $r="RAJINIKANTH";

    $a_arr = str_split($a);
    $r_arr = str_split($r);
print_r( $a_arr);
    $common = implode(array_unique(array_intersect($a_arr, $r_arr)));

    echo "'$common'";
?>