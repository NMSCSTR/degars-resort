<?php 
session_start();
$db = mysqli_connect('localhost', 'root', '', 'capstwo');
$id = $_GET['aminities_id'];
$deletecottage = mysqli_query($db,"DELETE FROM `aminities` WHERE aminities_id = '$id'");

if($deletecottage){
    $_SESSION['status'] = "Cottage deleted";
    $_SESSION['code'] = "success";
    header('Location: ../cottages.php');

    
} else {
    echo "<script>alert('Product not deleted');</script>";
}
$db->close();
?>