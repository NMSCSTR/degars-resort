<?php 
$db = mysqli_connect("localhost","root","","capstwo");

if(isset($_GET['reservation_id']) && isset($_GET['customer_id'])){
    $r = $_GET['reservation_id'];
    $c = $_GET['customer_id'];

    $dr =mysqli_query($db, "DELETE FROM `reservation` WHERE `reservation_id` = '$r'");
    $cr =mysqli_query($db, "DELETE FROM `customer` WHERE `customer_id` = '$c'");

    if ($dr && $cr) {
        $_SESSION['status'] = "Transaction successfully cancelled";
        $_SESSION['code'] = "success";
        header('Location: ../quickstart.php');
        // echo "<script>
        //         alert('Transaction successfully cancelled');
        //         setTimeout(function() {
        //             window.location.href = '../quickstart.php';
        //         }, 1000);
        //     </script>";
    } else {
        echo "<script>alert('Error: " . $db->error . "');</script>";
    }
$db->close();
}