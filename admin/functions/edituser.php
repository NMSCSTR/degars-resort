<?php 
$db = mysqli_connect("localhost","root","","capstwo");
if (isset($_POST['edituser'])) {
    $users_id = $_POST['users_id'];
    $users_username = $_POST['users_username'];
    $users_password = $_POST['users_password'];
    $users_firstname = $_POST['users_firstname'];
    $users_lastname = $_POST['users_lastname'];
    $users_role = $_POST['users_role'];

    $hashedPassword = hash('sha256', $users_password);

    $edituser = mysqli_query($db, "UPDATE `admin` SET `users_username` = '$users_username', `users_password` = '$hashedPassword', `users_firstname` = '$users_firstname', `users_lastname` = '$users_lastname', `users_role` = '$users_role' WHERE `users_id` = '$users_id' ");

    if ($edituser) {
        echo "<script>alert('User updated successfully'); window.location.href = '../users.php';</script>";
    }else {
        echo "<script>alert('Error'); window.location.href = '../users.php';</script>";
    }
    $db->close();
}

?>