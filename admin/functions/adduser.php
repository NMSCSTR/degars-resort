<?php
$db = mysqli_connect('localhost', 'root', '', 'capstwo');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['users_username'];
    $password = $_POST['users_password'];
    $firstname = $_POST['users_firstname'];
    $lastname = $_POST['users_lastname'];
    $role = $_POST['users_role'];

    // Hash the password using SHA-256
    $hashedPassword = hash('sha256', $password);

    // Prepare and execute the SQL query
    $sql = "INSERT INTO `admin` (`users_username`, `users_password`, `users_firstname`, `users_lastname`, `users_role`) 
            VALUES ('$username', '$hashedPassword', '$firstname', '$lastname', '$role')";

    if ($db->query($sql) === TRUE) {
        echo "<script>alert('User added successfully'); window.location.href = '../users.php';</script>";
    } else {
        echo "<script>alert('Error: " . $db->error . "');</script>";
    }

    // Close the database connection
    $db->close();
}
?>
