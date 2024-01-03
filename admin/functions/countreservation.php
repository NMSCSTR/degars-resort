<?php 
$db = mysqli_connect('localhost', 'root', '', 'capstwo');

$countcr = mysqli_num_rows(mysqli_query($db,"SELECT * FROM `completed_reservation`"));
$countw = mysqli_num_rows(mysqli_query($db,"SELECT * FROM `walkin_transac`"));

$all = $countcr + $countw;
$reservationMaxCount = 1000;
$reservationPercentage = ($all / $reservationMaxCount) * 100;
$reservationPercentage = round($reservationPercentage, 2);
$reservationProgressWidth = $reservationPercentage > 100 ? 100 : $reservationPercentage;

?>