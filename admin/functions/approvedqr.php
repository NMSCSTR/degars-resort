<?php 
$db = mysqli_connect('localhost', 'root', '', 'capstwo');
$pvq_id = $_GET['payviaqr_id'];
$approvedstatus = mysqli_query($db, "UPDATE `payviaqr` SET `status` ='Approved' WHERE `payviaqr_id` = $pvq_id ");

if ($approvedstatus) {
    header('Location: ../qrpayments.php');
}
?>