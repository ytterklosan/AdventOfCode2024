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
for ($i = 0; $i < count($array1); $i++) {
    $sum += abs($array1[$i] - $array2[$i]);
}
echo "Distance: " . $sum . "\n";
?>