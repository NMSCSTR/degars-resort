<?php 
$db = mysqli_connect('localhost', 'root', '', 'capstwo');
$id = $_GET['aminities_id'];
$deletecottage = mysqli_query($db,"DELETE FROM `aminities` WHERE aminities_id = '$id'");

if($deletecottage){
    echo "<script>alert('Cottage deleted successfully');</script>";
    header('Location: ../cottages.php');

    
} else {
    echo "<script>alert('Product not deleted');</script>";
}

?>