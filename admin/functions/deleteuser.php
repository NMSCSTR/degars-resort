<?php 
$conn = mysqli_connect('localhost', 'root', '', 'capstwo');

$users_id = $_GET['users_id'];
$deluser = mysqli_query($conn,"DELETE FROM `admin` WHERE users_id = '$users_id'");

if($deluser){
    echo "<script>alert('User deleted successfully'); window.location.href = '../users.php';</script>";
} else {
    echo "<script>alert('User not deleted');</script>";
}
$conn->close();
?>