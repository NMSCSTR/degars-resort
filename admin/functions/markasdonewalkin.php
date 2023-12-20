<?php 
$db = mysqli_connect('localhost', 'root', '', 'capstwo');

$walkin_id = $_GET['walkin_id'];
$approvedby = $_GET['approvedby'];
$wcustomer_id = $_GET['wcustomer_id'];

$mark_as_done = mysqli_query($db, "UPDATE `walkin_transac` SET `status` ='Done', `approvedby` = '$approvedby' WHERE `walkin_id` = '$walkin_id' AND `wcustomer_id` = '$wcustomer_id' ");

if ($mark_as_done) {
    header('Location: ../walkin.php');
}
$db->close();
?>