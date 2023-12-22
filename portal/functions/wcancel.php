<?php 
$db = mysqli_connect("localhost","root","","capstwo");

if(isset($_GET['walkin_id']) && isset($_GET['wcustomer_id'])){
    $r = $_GET['walkin_id'];
    $c = $_GET['wcustomer_id'];

    $dr =mysqli_query($db, "DELETE FROM `walkin` WHERE `walkin_id` = '$r'");
    $cr =mysqli_query($db, "DELETE FROM `walkincustomer` WHERE `wcustomer_id` = '$c'");

    if ($dr && $cr) {
        echo "<script>
                alert('Transaction successfully cancelled');
                setTimeout(function() {
                    window.location.href = '../quickstart.php';
                }, 1000);
            </script>";
    } else {
        echo "<script>alert('Error: " . $db->error . "');</script>";
    }
$db->close();
}