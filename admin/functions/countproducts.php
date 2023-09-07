<?php
include '../config/db_connection.php';

$gettotalrow = mysqli_query($conn, "SELECT * FROM products");
if ($gettotalrow) {
    $totalproducts = mysqli_num_rows($gettotalrow);
    $productMaxCount = 100;
    $productPercentage = ($totalproducts / $productMaxCount) * 100;
    $productPercentage = round($productPercentage, 2);
    $productProgressWidth = $productPercentage > 100 ? 100 : $productPercentage;

} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
