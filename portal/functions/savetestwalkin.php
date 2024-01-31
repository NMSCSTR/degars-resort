<?php
session_start();
error_reporting(E_ALL);

$db = mysqli_connect('localhost', 'root', '', 'capstwo');

// Function to check if the specified amenity_id exists in the amenities table
function checkAmenities($db, $amenity_id)
{
    $checkAmenities = mysqli_query($db, "SELECT aminities_id FROM aminities WHERE aminities_id = '$amenity_id'");
    return $checkAmenities && mysqli_num_rows($checkAmenities) > 0;
}

if (isset($_POST['addwalkin'])) {
    $entrancefee = $_POST['entrancefee'];
    $walkindate = $_POST['walkindate'];
    $numberofheads = $_POST['numberofheads'];

    // Check if amenities are provided
    if (isset($_POST['amenities']) && !empty($_POST['amenities'])) {
        $selected_amenities = $_POST['amenities'];

        // Validate each selected amenity
        foreach ($selected_amenities as $amenity_id) {
            if (!checkAmenities($db, $amenity_id)) {
                echo "Error: The specified amenity ID $amenity_id does not exist.";
                exit();
            }
        }


        // Manually generate walkin_id
        $walkin_id = generateUniqueWalkinID($db);


        // Insert the reservation for each selected amenity
        $successFlag = true; // Flag to track if all insertions are successful
        foreach ($selected_amenities as $amenity_id) {
            $insertQuery = "INSERT INTO `walkin` (`walkin_id`, `entrancefee`, `walkindate`, `numberofheads`, `aminities_id`) 
                            VALUES ('$walkin_id', '$entrancefee', '$walkindate', '$numberofheads', '$amenity_id')";
            if (!mysqli_query($db, $insertQuery)) {
                $successFlag = false;
                break; // Exit the loop if any insertion fails
            }
        }

        // Redirect the user based on the success of all insertions
        if ($successFlag) {
            $_SESSION['status'] = "Reservation saved successfully";
            $_SESSION['code'] = "Success";
            header("Location: ../exclusive/wcustomer.php?walkin_id=$walkin_id");
            exit();
        } else {
            echo "Error: Failed to save reservation.";
            exit();
        }
    } else {
        echo "Error: No amenities selected.";
        exit();
    }
} else {
    echo "Error: Form submission failed.";
    exit();
}

// Function to generate a unique walkin_id
// Function to generate a unique walkin_id
function generateUniqueWalkinID($db) {
    // Loop until a unique ID is found
    do {
        $new_walkin_id = mt_rand(10000, 99999); // Generate a random ID
        $check_query = "SELECT walkin_id FROM walkin WHERE walkin_id = $new_walkin_id";
        $result = mysqli_query($db, $check_query);
    } while (mysqli_num_rows($result) > 0);

    return $new_walkin_id;
}

?>
