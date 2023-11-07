<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
        $_SESSION['reservation_type'] = $type;
        $_SESSION['reservation_eventname'] = $eventname;
        $_SESSION['reservation_date'] = $reservationdate;
        $_SESSION['reservation_paymentduedate'] = $paymentduedate;
        $_SESSION['reservation_rates'] = $rates;
        header('Location: ../exclusive/customerForm.php?' . http_build_query($_SESSION));
        // header('Location: ../exclusive/customerForm.php');
    } else {
        echo "Error adding reservation";
    }

}
?>

