<?php 
session_start();
$db = mysqli_connect("localhost","root","","capstwo");
if (isset($_POST['reqrefund'])) {

    $transaction_ref = $_POST['transaction_ref'];
    $savereq = mysqli_query($db, "INSERT INTO `refund` (`comres_id`, `customer_id`, `reservation_id`, `payment_id`, `transaction_ref`, `refundedamount`, `reason`, `status`) VALUES ('". $_POST['comres_id'] ."', '". $_POST['customer_id'] ."', '". $_POST['reservation_id'] ."', '". $_POST['payment_id'] ."', '". $_POST['transaction_ref'] ."', '". $_POST['refundedamount'] ."', '". $_POST['reason'] ."', 'Pending')");

    if ($savereq) {
        $_SESSION['status'] = "Request Sent";
        $_SESSION['code'] = "success";
        header('Location: ../exclusive/check.php?transaction_ref='.$transaction_ref);
        exit();
    }else {
        echo "Error!";
    }
}
