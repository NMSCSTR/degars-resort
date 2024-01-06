<?php 
session_start();
$db = mysqli_connect('localhost', 'root', '', 'capstwo');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $packageName = $_POST["packagename"];
    $packageRate = $_POST["rate"];

    // File handling
    $targetDir = "../packages/";  // Adjust the target directory as needed
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);

    // Assuming you want to store the file name in the database
    $imageName = basename($_FILES["image"]["name"]);

    // SQL query to insert data into the packages table
    $sql = "INSERT INTO packages (package_name, package_rate, image_name) VALUES ('$packageName', $packageRate, '$imageName')";

    if ($db->query($sql) === TRUE) {
        // Move uploaded file to the target directory
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

        $_SESSION['status'] = "Package added successfully";
        $_SESSION['code'] = "success";
        header("Location: ../package.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

$db->close();
?>