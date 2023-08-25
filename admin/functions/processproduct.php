<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('functions.php'); 


$setCategory = new Product();

if (isset($_POST['addProduct'])) {
    $productname = $_POST['productname'];
    $price = number_format($_POST['price'], 2);
    $status = $_POST['status'];
    $categoryid = $_POST['categoryid'];

    if ($setCategory->addProduct($productname, $price, $status, $categoryid)) {
        $_SESSION['status'] = "Product added successfully";
        $_SESSION['status_code'] = "success";
        header('Location: ../product.php');
    } else {
        echo "Error adding product";
    }


} elseif (isset($_POST['updateProduct'])) {
    $productid = $_POST['productid'];
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $categoryid = $_POST['categoryid'];

    if ($setCategory->updateProduct($productid, $productname, $price, $status, $categoryid)) {
        $_SESSION['status'] = "Product updated successfully";
        $_SESSION['status_code'] = "success";
        header('Location: ../product.php');
    } else {
        echo "Error updating product price";
    }


} elseif (isset($_GET['deleteProductById'])) {
    $deleteProductById = $_GET['deleteProductById'];

    if ($setCategory->deleteProduct($deleteProductById)) {
        $_SESSION['status'] = "Deleted Successfully";
        // $_SESSION['code'] = "Success";
        echo "<script>window.location.href='http://localhost/final/admin/product.php';</script>";
    } else {
        echo "<script>window.location.href='http://localhost/final/admin/product.php';</script>";
    }
}

$setCategory = new Category();

if (isset($_POST['addCategory'])) {
    $categoryname = $_POST['categoryname'];

    if ($setCategory->addCategory($categoryname)) {
        $_SESSION['status'] = "Inserted successfully";
        $_SESSION['status_code'] = "success";
        $_SESSION['icon'] = "success";
        header("Location: ../category.php");
        exit();
    }
    else {
        $_SESSION['status_code'] = "error";
    }


}elseif(isset ($_POST ['updateCategory'])){
    $categoryid = $_POST['categoryid'];
    $categoryname = $_POST['categoryname'];

    if ($setCategory->updateCategory($categoryid, $categoryname)) {
        $_SESSION['status'] = "Updated successfully";
        $_SESSION['status_code'] = "success";
        $_SESSION['icon'] = "success";
        header('Location: ../category.php');
    }
    else {
        echo "Error updating category";
    }


}elseif(isset($_GET['deleteCategoryById'])){
    $deleteCategoryById = $_GET['deleteCategoryById'];

    if ($setCategory->deleteCategory($deleteCategoryById)) {
        $_SESSION['status'] = "Deleted Successfully";
        $_SESSION['code'] = "success";
        header("Location: ../category.php");
    }
    else {
        echo "<script>window.location.href='http://localhost/final/admin/category.php';</script>";
    }
            

}

?>
