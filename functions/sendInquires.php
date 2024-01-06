<?php 
session_start();
$db = mysqli_connect("localhost","root","","capstwo");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $sql = "INSERT INTO inquiries (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($db->query($sql) === TRUE) {
        // $_SESSION['status'] = "Inserted Successfully";
        // $_SESSION['code'] = "success";
        header('Location: ../index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

$db->close();
?>