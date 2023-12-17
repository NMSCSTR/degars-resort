<?php 
$db = mysqli_connect("localhost","root","","capstwo");
if (isset($_POST['reqrefund'])) {
    $savereq = mysqli_query($db, "INSERT INTO `refund` (`comres_id`, `customer_id`, `reservation_id`, `payment_id`, `transaction_ref`, `refundedamount`, `reason`, `status`) VALUES ('". $_POST['comres_id'] ."', '". $_POST['customer_id'] ."', '". $_POST['reservation_id'] ."', '". $_POST['payment_id'] ."', '". $_POST['transaction_ref'] ."', '". $_POST['refundedamount'] ."', '". $_POST['reason'] ."', 'Pending')");

    if ($savereq) {
        header('Location: ../exclusive/check.php');
        exit();
    }else {
        echo "Error!";
    }
}