<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'capstwo');
$pvq_id = $_GET['payviaqr_id'];
$reservation_id = $_GET['reservation_id'];
$approvedby = $_GET['approvedby'];
$customer_id = $_GET['customer_id'];
$approvedstatus = mysqli_query($db, "UPDATE `payviaqr` SET `status` ='Approved', `approvedby` = '$approvedby'  WHERE `payviaqr_id` = $pvq_id ");
$approvedcrstatus = mysqli_query($db, "UPDATE `completed_reservation` SET `status` ='Approved:QR', `approvedby` = '$approvedby' WHERE `reservation_id` = $reservation_id AND customer_id = $customer_id ");

if ($approvedstatus && $approvedcrstatus) {
    $_SESSION['status'] = "Approved Transaction";
    $_SESSION['code'] = "success";
    header("Location: ../qrpayments.php");
}
$db->close();
?>