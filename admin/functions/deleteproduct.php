<?php 
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'capstwo');
$productid = $_GET['productid'];
$deleteproduct = mysqli_query($conn,"DELETE FROM `product` WHERE productid = '$productid'");

if($deleteproduct){
    echo "<script>alert('Product deleted successfully');</script>";
    echo "<script>window.location.href='http://localhost/final/admin/product.php';</script>";

    
} else {
    echo "<script>alert('Product not deleted');</script>";
}
$db->close();
?>