<?php
$db = mysqli_connect("localhost","root","","capstwo");
if (isset($_POST['addReservation'])) {

    $type = $_POST['type'];
    $eventname = $_POST['eventname'];
    $reservationdate = $_POST['reservationdate'];
    $paymentduedate  = date('Y-m-d', strtotime('-3 days', strtotime($reservationdate)));
    $rates = $_POST['rates'];

    $addreservation = mysqli_query($db, "INSERT INTO reservation (type, eventname, reservationdate, paymentduedate, rates)
    VALUES ('$type','$eventname', '$reservationdate', '$paymentduedate', '$rates')");
    
    if ($addreservation) {
        
        $get_last_id = mysqli_query($db, "SELECT * FROM `reservation` ORDER BY `datetimeadded` DESC LIMIT 1");
        $fetchrow = mysqli_fetch_array($get_last_id);
        $_SESSION['exclusive_res_id'] = $fetchrow['reservation_id'];

        header('Location:../exclusive/customerForm.php?reservation_id='.$_SESSION['exclusive_res_id'].'&type='.urlencode($type).'&eventname='.$fetchrow['eventname'].'&reservationdate='.$fetchrow['reservationdate'].'');
        exit();

    }
} else {

    echo "Error: " . mysqli_error($db);
    
}

?>