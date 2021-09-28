<?php
// method one
function getNumber(int $n) {
    if ($n < 0) return '$n should not less than 0';
    if ($n === 0) return 0;
    if ($n === 1) return 1;
    $prepre = 0;
    $pre = 1;
    for ($i = 2; $i <= $n; $i++) {
        $temp = $pre;
        $pre = $pre + $prepre;
        $prepre = $temp;
    }
    return $pre;
}

// method two
$cache = [];
function getNumber2(int $n) {
    global $cache;
    if ($n < 0) return '$n should not less than 0';
    if ($n === 0) return 0;
    if ($n === 1) return 1;
    if (isset($cache[$n])) {
        return $cache[$n];
    } else {
        $result =  getNumber2($n - 1) + getNumber2($n - 2);
        $cache[$n] = $result;
        return $result;
    }
}


for ($i = 0; $i <= 20; $i++) {
    print_r('------------------------------' . "\n");
    print_r('when number is ' . $i . "\n");
    print_r('by method one, we got '. getNumber($i) . "\n");
    print_r('by method two, we got '. getNumber2($i) . "\n");
}

