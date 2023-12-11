<?php 

$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "capstwo";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

$sql = "SELECT reservation_id FROM `reservation` ORDER BY `datetimeadded` DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $getLastId = $row['reservation_id'];

} else {
    echo "No reservations found.";
}

?>
