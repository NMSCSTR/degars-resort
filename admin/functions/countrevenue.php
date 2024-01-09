<?php 
$db = mysqli_connect('localhost', 'root', '', 'capstwo');

$countcr = mysqli_num_rows(mysqli_query($db,"SELECT * FROM `completed_reservation`"));
$countqr = mysqli_num_rows(mysqli_query($db,"SELECT * FROM `payviaqr`"));
$allreservation = $countcr + $countqr;
$countref = mysqli_num_rows(mysqli_query($db,"SELECT * FROM `refund`"));
$sum = mysqli_fetch_assoc(mysqli_query($db,"SELECT SUM(totalamount) AS total FROM `completed_reservation` WHERE `status` = 'Approved' OR `status` = 'Approved:QR' AND `status` = 'Done'"));

$totalRevenueMaxCount = 100000;
echo $total = $sum['total'];
$revenuePercentage = ($total / $totalRevenueMaxCount) * 100;
$revenuePercentage = round($revenuePercentage, 2);
$revenueProgressWidth = $revenuePercentage > 100 ? 100 : $revenuePercentage;
?>