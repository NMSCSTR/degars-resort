<?php 
$db = mysqli_connect('localhost', 'root', '', 'capstwo');

$reservation_id = $_GET['reservation_id'];
$approvedby = $_GET['approvedby'];
$customer_id = $_GET['customer_id'];

$markasdone = mysqli_query($db, "UPDATE `completed_reservation` SET `status` ='Done', `approvedby` = '$approvedby' WHERE `reservation_id` = $reservation_id AND customer_id = $customer_id ");

if ($markasdone) {
    header('Location: ../exclusive.php');
}
$db->close();
?>