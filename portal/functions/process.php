<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// $db = mysqli_connect('localhost', 'root', '', 'capstwo');
// $fetchid = "SELECT reservation_id FROM reservation ORDER By datetimeadded DESC";
// $row = mysqli_fetch_assoc($db,$fetchid);

require_once('functions.php'); 

$setReservation = new Reservations();

if (isset($_POST['addReservation'])) {
    $type = $_POST['type'];
    $eventname = $_POST['eventname'];
    $reservationdate = $_POST['reservationdate'];
    $paymentduedate  = date('Y-m-d', strtotime('-3 days', strtotime($reservationdate)));
    $rates = $_POST['rates'];

    if ($setReservation->addReservation($type,$eventname,$reservationdate,$paymentduedate,$rates)) {
        $_SESSION['status'] = "Reservation save successfully!";
        $_SESSION['code'] = "success";
        $reservation_id = $row['reservation_id'];
        $_SESSION['reservation_id'] = $reservation_id;
        header('Location: ../exclusive/customerForm.php?' . http_build_query($_SESSION));
    } else {
        echo "Error adding reservation";
    }

}
?>

