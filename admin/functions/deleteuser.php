<?php 
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'capstwo');

$users_id = $_GET['users_id'];
$deluser = mysqli_query($conn,"DELETE FROM `admin` WHERE users_id = '$users_id'");

if($deluser){
    $_SESSION['status'] = "User Deleted";
    $_SESSION['code'] = "success";
    header("Location: ../users.php");
} else {    // echo "<script>alert('User deleted successfully'); window.location.href = '../users.php';</script>";
    echo "<script>alert('User not deleted');</script>";
}
$conn->close();
?>