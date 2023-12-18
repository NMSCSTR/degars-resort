
<?php
session_start();
error_reporting(E_ALL);

$db = mysqli_connect("localhost", "root", "", "capstwo");
if (isset($_POST['addwalkin'])) {

    $entrancefee = $_POST['entrancefee'];
    $numberofheads = $_POST['numberofheads'];
    $aminities_id = $_POST['aminities_id'];

    $addreservation = mysqli_query($db, "INSERT INTO `walkin` (`entrancefee`, `numberofheads`, `aminities_id`) VALUES ('$entrancefee', '$numberofheads', '$aminities_id')");
    
    if ($addreservation) {
        
        $get_last_id = mysqli_query($db, "SELECT * FROM `walkin` ORDER BY `dateadded` DESC LIMIT 1");
        $fetchrow = mysqli_fetch_array($get_last_id);
        $_SESSION['walkin_id'] = $fetchrow['walkin_id'];

        header('Location:../exclusive/wcustomer.php?walkin_id='.$_SESSION['walkin_id'].'');
        exit();

    } else {

        echo "Error: " . mysqli_error($db);
    
    }
} else {
    echo "Error: No data received.";
}
?>
