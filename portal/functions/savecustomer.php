<?php
$db = mysqli_connect("localhost","root","","capstwo");

if(isset($_POST['savecustomer'])){
    $reservation_id = $_POST['reservation_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email_address  = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];

    $savecustomer = mysqli_query($db, "INSERT INTO customer (`reservation_id`, `firstname`, `lastname`, `email_address`, `phone_number`) VALUES ('$reservation_id', '$firstname', '$lastname', '$email_address', '$phone_number')");

    $gettype = mysqli_fetch_assoc(mysqli_query($db,"SELECT `type` FROM reservation WHERE `reservation_id` = '$reservation_id'"));

    if ($savecustomer) {
        $get_cus_id = mysqli_query($db, "SELECT * FROM `customer` ORDER BY `date_inserted` DESC LIMIT 1");
        $fetchcus = mysqli_fetch_array($get_cus_id);
        $customer_id = $fetchcus['customer_id'];
        $reservation_id = $fetchcus['reservation_id'];

        header('Location: ../exclusive/review.php?customer_id='. $customer_id .'&reservation_id='. $reservation_id . '&type=' . $gettype['type'] .'');
        exit();
    } else {

        echo "Error: " . mysqli_error($db);

    }
    
}

