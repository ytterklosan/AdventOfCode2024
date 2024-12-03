#!/usr/bin/env php
<?php

$input = file_get_contents('php://stdin');

$sum = 0;
$matches = [];
preg_match_all('/mul\((\d+),(\d+)\)/', $input, $matches);
for ($i = 0; $i < count($matches[0]); $i++) {
    $sum += $matches[1][$i] * $matches[2][$i];
}
echo "Sum: " . $sum . "\n";