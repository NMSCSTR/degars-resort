<?php
session_start();
error_reporting(E_ALL);

$db = mysqli_connect('localhost', 'root', '', 'capstwo');

// Function to check if the specified aminities_id exists in the aminities table
function checkAminities($db, $aminities_id)
{
    $checkAminities = mysqli_query($db, "SELECT aminities_id FROM aminities WHERE aminities_id = '$aminities_id'");

    return $checkAminities && mysqli_num_rows($checkAminities) > 0;
}

if (isset($_POST['addwalkin'])) {

    $entrancefee = $_POST['entrancefee'];
    $numberofheads = $_POST['numberofheads'];

    // Check if aminities_id is provided and not equal to 0
    if (isset($_POST['aminities_id']) && $_POST['aminities_id'] != 0) {
        $aminities_id = $_POST['aminities_id'];

        // Check if the specified aminities_id exists in the aminities table
        if (!checkAminities($db, $aminities_id)) {
            echo "Error: The specified aminities_id does not exist.";
            exit();
        }
    } else {
        // If aminities_id is 0 or not provided, set it to 0
        $aminities_id = 0;
    }

    $addreservation = mysqli_query($db, "INSERT INTO `walkin` (`entrancefee`, `numberofheads`, `aminities_id`) VALUES ('$entrancefee', '$numberofheads', '$aminities_id')");
    
    if ($addreservation) {
        $_SESSION['status'] = "Inserted Successfully";
        $_SESSION['code'] = "success";
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