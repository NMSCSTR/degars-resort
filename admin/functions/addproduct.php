<?php 
include 'manorsdb.php';
if (isset($_POST['submit'])) {
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $category = $_POST['category'];

    // Insert data into database
    $insertproduct = "INSERT INTO `product` (`productname`, `price`, `status`, `category`) VALUES ('$productname', '$price', '$status', '$category')";

    if ($conn->query($insertproduct) === TRUE) {
        echo '<script>alert("Product Inserted Successfully");</script>';
        header('Location: ../product.php');
    } else {
        echo $sql."<br>".$conn->error;
    }

    // Close databsase connection
    $conn->close();

}

?>