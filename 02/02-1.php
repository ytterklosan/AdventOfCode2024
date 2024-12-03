#!/usr/bin/env php
<?php

$input = file_get_contents('php://stdin');
$lines = explode("\n", trim($input));
$sum = 0;
foreach ($lines as $line) {
    $report = preg_split('/\s+/', $line);
    if ($report[0] > $report[count($report) - 1]) {
        $report = array_reverse($report);
    }
    for ($i = 0; $i < count($report)-1; $i++) {
        $d = $report[$i+1] - $report[$i];
        if ($d < 1 || $d > 3) {
            continue 2;
        }
    }
    $sum++;
}
echo "Safe reports: " . $sum . "\n";
