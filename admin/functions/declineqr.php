<?php 
$db = mysqli_connect('localhost', 'root', '', 'capstwo');
$pvq_id = $_GET['payviaqr_id'];
$declinestatus = mysqli_query($db, "UPDATE `payviaqr` SET `status` ='Declined' WHERE `payviaqr_id` = $pvq_id ");

if ($declinestatus) {
    header('Location: ../qrpayments.php');
}
?>