<?php 
$db = mysqli_connect('localhost', 'root', '', 'capstwo');
$id = $_GET['id'];
$deleteroom = mysqli_query($db,"DELETE FROM `room_aminities` WHERE id = '$id'");

if($deleteroom){
    echo "<script>alert('Room deleted successfully');</script>";
    header('Location: ../rooms.php');

    
} else {
    echo "<script>alert('Room not deleted');</script>";
}
$db->close();
?>