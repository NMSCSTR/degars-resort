<?php
$counterFile = '../visitor_count.txt';
$currentCount = (int) file_get_contents($counterFile);
$maxCount = 10000; 
$percentage = ($currentCount / $maxCount) * 100;
$percentage = round($percentage, 2);
$progressWidth = $percentage > 100 ? 100 : $percentage;
?>