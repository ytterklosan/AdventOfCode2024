#!/usr/bin/env php
<?php

$input = file_get_contents('php://stdin');

$sum = 0;
$matches = [];
preg_match_all('/(do\(\)|don\'t\(\))|(mul\((\d+),(\d+)\))/', $input, $matches);
$multiply = true;
for ( $i = 0; $i < count($matches[0]); $i++) {
    if ($matches[1][$i] == 'do()') {
        $multiply = true;
    } elseif ($matches[1][$i] == 'don\'t()') {
        $multiply = false;
    } else {
        $a = $matches[3][$i];
        $b = $matches[4][$i];
        if ($multiply) {
            $sum += $a * $b;
        } 
        
        
    }
}
echo "Sum: " . $sum . "\n";