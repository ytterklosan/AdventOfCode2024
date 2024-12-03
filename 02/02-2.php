#!/usr/bin/env php
<?php
function isSafeReport($report) {
    echo "Checking: " . implode(" ", $report) . " ";
    $low = 1;
    $high = 3;
    if ($report[0] > $report[1]) {
        echo "decending ";
        $low = -3;
        $high = -1;
    }
    for ($i = 0; $i < count($report) - 1; $i++) {
        $d = $report[$i + 1] - $report[$i];
        if ($d < $low || $d > $high) {
            echo "unsafe " . $i . "\n";
            return false;

        }
    }
    echo "safe\n";
    return true;
}

$input = file_get_contents('php://stdin');
$lines = explode("\n", trim($input));
$sum = 0;
echo "Reports: " . count($lines) . "\n";
foreach ($lines as $line) {
    echo $line . " ";
    $report = preg_split('/\s+/', $line);
    

    
 
    if (isSafeReport($report)) {
        $sum++;
    } else {
        $len = count($report);
        for ($i = 0; $i < $len; $i++) {
            $memo = $report[$i];

            array_splice($report, $i, 1);
            if (isSafeReport($report)) {
                $sum++;
                break;
            }
            array_splice($report, $i, 0, $memo);
        }
    }
    echo "\n";
    
}
echo "Safe reports: " . $sum . "\n";
