<?php 
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'capstwo');
// Assuming the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $packageId = $_POST["id"];
    $packageName = $_POST["package_name"];
    $packageRate = $_POST["package_rate"];

    // Check if a new image is uploaded
    if ($_FILES["image"]["size"] > 0) {
        // File handling
        $targetDir = "../packages/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $imageName = basename($_FILES["image"]["name"]);

        // Update package details and image name in the database
        $sql = "UPDATE packages SET package_name = '$packageName', package_rate = $packageRate, image_name = '$imageName' WHERE id = $packageId";

        // Delete existing image file
        $deleteSql = "SELECT image_name FROM packages WHERE id = $packageId";
        $deleteResult = $conn->query($deleteSql);

        if ($deleteResult->num_rows > 0) {
            $deleteRow = $deleteResult->fetch_assoc();
            $existingImageName = $deleteRow['image_name'];

            $existingFilePath = "../packages/" . $existingImageName;
            if (file_exists($existingFilePath)) {
                unlink($existingFilePath);
            }
        }

        // Move uploaded file to the target directory
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
    } else {
        // Update package details without changing the image
        $sql = "UPDATE packages SET package_name = '$packageName', package_rate = $packageRate WHERE id = $packageId";
    }

    if ($conn->query($sql) === TRUE) {
        $_SESSION['status'] = "Package updated successfully!";
        $_SESSION['code'] = "success";
        header("Location: ../package.php");
    } else {
        echo "Error updating package: " . $conn->error;
    }
}


$conn->close();
?>