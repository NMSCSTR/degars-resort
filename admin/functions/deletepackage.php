<?php 
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'capstwo');
if (isset($_GET['id'])) {
    $packageId = $_GET['id'];

    // Retrieve image name from the database
    $sql = "SELECT image_name FROM packages WHERE id = $packageId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imageName = $row['image_name'];

        // Delete package from the database
        $deleteSql = "DELETE FROM packages WHERE id = $packageId";

        if ($conn->query($deleteSql) === TRUE) {
            // Delete image from the uploads directory
            $filePath = "../packages/" . $imageName;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $_SESSION['status'] = "Package deleted successfully!";
            $_SESSION['code'] = "success";
            header("Location: ../package.php");
        } else {
            echo "Error deleting package: " . $conn->error;
        }
    } else {
        echo "Package not found.";
    }
} else {
    echo "Package ID not provided.";
}

// Close the database connection
$conn->close();
?>