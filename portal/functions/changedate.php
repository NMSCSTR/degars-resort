<?php 
session_start();
$db = mysqli_connect("localhost","root","","capstwo");
if (isset($_POST['changeDate'])) {
    $transaction_ref = $_POST['transaction_ref'];
    $reservation_id = $_POST['reservation_id'];
    $reservationdate = $_POST['reservationdate'];
    $paymentduedate  = date('Y-m-d', strtotime('-3 days', strtotime($reservationdate)));

    $changedate = mysqli_query($db,"UPDATE `reservation` SET `reservationdate`='$reservationdate',`paymentduedate`='$paymentduedate' WHERE `reservation_id` = '$reservation_id'");

    if ($changedate) {
        $_SESSION['status'] = "Reservation date changed!";
        $_SESSION['code'] = "success";
        header('Location: ../exclusive/check.php?transaction_ref=' . $transaction_ref);
        
    }else {
        header('Location: ../exclusive/check.php?transaction_ref='. $transaction_ref);
    }
}
?>