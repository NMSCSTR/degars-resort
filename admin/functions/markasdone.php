<?php 
session_start();
$db = mysqli_connect('localhost', 'root', '', 'capstwo');

$reservation_id = $_GET['reservation_id'];
$approvedby = $_GET['approvedby'];
$customer_id = $_GET['customer_id'];

$markasdone = mysqli_query($db, "UPDATE `completed_reservation` SET `status` ='Done', `approvedby` = '$approvedby' WHERE `reservation_id` = $reservation_id AND customer_id = $customer_id ");

if ($markasdone) {
    $_SESSION['status'] = "Mark As Done successfully";
    $_SESSION['code'] = "success";
    header('Location: ../exclusive.php');
}
$db->close();
?>