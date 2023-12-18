<?php 
$db = mysqli_connect('localhost', 'root', '', 'capstwo');

$countcr = mysqli_num_rows(mysqli_query($db,"SELECT * FROM `completed_reservation`"));
$countqr = mysqli_num_rows(mysqli_query($db,"SELECT * FROM `payviaqr`"));
$allreservation = $countcr + $countqr;
$countref = mysqli_num_rows(mysqli_query($db,"SELECT * FROM `refund`"));
$sum = mysqli_fetch_assoc(mysqli_query($db,"SELECT SUM(totalamount) AS total FROM `completed_reservation` WHERE `status` = 'Approved'"));

$productMaxCount = 500;
$reservationPercentage = ($sum['total'] / $productMaxCount) * 100;
$reservationPercentage = round($reservationPercentage, 2);
$reservationProgressWidth = $reservationPercentage > 1000 ? 1000 : $reservationPercentage;
?>