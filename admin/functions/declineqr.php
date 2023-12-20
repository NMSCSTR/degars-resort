<?php 
$db = mysqli_connect('localhost', 'root', '', 'capstwo');
$pvq_id = $_GET['payviaqr_id'];
$pvq_id = $_GET['payviaqr_id'];
$reservation_id = $_GET['reservation_id'];
$customer_id = $_GET['customer_id'];
$approvedby = $_GET['approvedby'];
$declinestatus = mysqli_query($db, "UPDATE `payviaqr` SET `status` ='Declined', `approvedby` = '$approvedby' WHERE `payviaqr_id` = $pvq_id ");
$approvedcrstatus = mysqli_query($db, "UPDATE `completed_reservation` SET `status` ='Declined', `approvedby` = '$approvedby' WHERE `reservation_id` = $reservation_id AND customer_id = $customer_id ");

if ($declinestatus && $approvedcrstatus) {
    header('Location: ../qrpayments.php');
}
$db->close();
?>