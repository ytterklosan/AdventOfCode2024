#!/usr/bin/env php
<?php

$input = file_get_contents('php://stdin');
$lines = explode("\n", trim($input));

$array1 = [];
$array2 = [];

foreach ($lines as $line) {
    list($num1, $num2) = preg_split('/\s+/', $line);
    $array1[] = (int)$num1;
    $array2[] = (int)$num2;
}
sort($array1);
sort($array2);

$sum = 0;
$i2=0;
for ($i = 0; $i < count($array1); $i++) {
    while ($i2 < count($array2) && $array2[$i2] < $array1[$i]) {
        $i2++;
    }
    if ($i2 >= count($array2)) {
        break;
    }
    if ($array2[$i2] == $array1[$i]) {
        $cnt=0;
        $i3=$i2;
        while ($array2[$i3] == $array1[$i]) {
            $cnt++;
            $i3++;
        }
        $sum += $array1[$i] * $cnt;

    }

    
}
echo "Similarity: " . $sum . "\n";
?>