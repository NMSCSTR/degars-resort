<?php
// your_php_script.php

$db = mysqli_connect('localhost', 'root', '', 'capstwo');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['aminities_id'])) {
    $aminities_id = $_POST['aminities_id'];

    // Query to fetch images based on the selected aminities_id
    $fetch_images_query = "SELECT `image1`, `image2`, `image3` FROM `aminities` WHERE `aminities_id` = $aminities_id";
    $result_images = $db->query($fetch_images_query);

    if ($result_images) {
        $images = $result_images->fetch_assoc();

        // Send images as a JSON response
        header('Content-Type: application/json');
        echo json_encode($images);
    } else {
        // Handle the error appropriately (send an error response, log, etc.)
        header('HTTP/1.1 500 Internal Server Error');
        echo 'Error fetching images: ' . $db->error;
    }
} else {
    // Handle invalid request (send an error response, log, etc.)
    header('HTTP/1.1 400 Bad Request');
    echo 'Invalid request';
}

$db->close();
?>
