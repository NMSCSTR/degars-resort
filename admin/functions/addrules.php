<?php
$db = mysqli_connect('localhost', 'root', '', 'capstwo');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rules = $_POST['rules'];

    $addrules = mysqli_query($db, "INSERT INTO `rules`(`rules`) VALUES ('$rules')");

    if ($addrules) {
        echo "<script>alert('Rule added successfully'); window.location.href = '../rules.php';</script>";
    }else {
        echo "<script>alert('Error: " . $db->error . "');</script>";
    }
    $db->close();
}