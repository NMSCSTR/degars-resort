<?php
session_start();
$db = mysqli_connect("localhost","root","","capstwo");

if(isset($_POST['savewcustomer'])){
    $walkin_id = $_POST['walkin_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email_address  = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];

    $savecustomer = mysqli_query($db, "INSERT INTO walkincustomer (`walkin_id`, `firstname`, `lastname`, `email_address`, `phone_number`) VALUES ('$walkin_id', '$firstname', '$lastname', '$email_address', '$phone_number')");

    //$getdetails = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM walkin WHERE `walkin_id` = '$walkin_id'"));

    if ($savecustomer) {
        $_SESSION['status'] = "Inserted Successfully";
        $_SESSION['code'] = "success";
        $getwcus_id = mysqli_query($db, "SELECT * FROM `walkincustomer` ORDER BY `datetimeadded` DESC LIMIT 1");
        $fwcus = mysqli_fetch_array($getwcus_id);
        $wcustomer_id = $fwcus['wcustomer_id'];
        

        header('Location: ../exclusive/wreview.php?wcustomer_id='. $wcustomer_id .'&walkin_id='. $walkin_id .'');
        exit();
    } else {

        echo "Error: " . mysqli_error($db);

    }
    
}

