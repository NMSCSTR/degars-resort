<?php

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "capstwo";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

$getUrl = mysqli_query($conn, "SELECT checkouturl FROM `completed_reservation` ");

while ($row = mysqli_fetch_assoc($getUrl)) {
    echo $row['checkouturl'] . "<br>";
}

// Close the connection when you're done
mysqli_close($conn);
?>
