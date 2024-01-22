<?php 
session_start();
$db = mysqli_connect('localhost', 'root', '', 'capstwo');
$refund_id = $_GET['refund_id'];
$comres_id = $_GET['comres_id'];
$reservation_id = $_GET['reservation_id'];
$customer_id = $_GET['customer_id'];
$payment_id = $_GET['payment_id'];
$approvedby = $_GET['approvedby'];

$declinestatus = mysqli_query($db, "UPDATE `refund` SET `status` ='Declined', `approvedby` = '$approvedby' WHERE `refund_id` = $refund_id ");

if ($declinestatus) {
    $_SESSION['status'] = "Declined Refund Successful";
    $_SESSION['code'] = "success";
    header("Location: ../refund.php");
}
$db->close();
?>