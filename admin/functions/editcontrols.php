<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'capstwo');

if (isset($_POST['reservationPanel'])) {
    $package1_imagelink = urlencode($_POST['package1_imagelink']);
    $package2_imagelink = urlencode($_POST['package2_imagelink']);
    $package1_rate = $_POST['package1_rate'];
    $package2_rate = $_POST['package2_rate'];
    $exclusiverate = $_POST['exclusiverate'];
    $entrancefee = $_POST['entrancefee'];

    $updateReservationPanel = mysqli_query($db, "UPDATE `control` SET `entrancefee`='$entrancefee',`package1_rate`='$package1_rate',`package1_imagelink`='$package1_imagelink',`package2_rate`='$package2_rate',`package2_imagelink`='$package2_imagelink',`exclusiverate`='$exclusiverate' WHERE `control_id` = 1");

}elseif (isset($_POST['socialMediaPanel'])) {

    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $updateSociaMediaPanel = mysqli_query($db, "UPDATE `control` SET `facebook`='$facebook ',`instagram`='$instagram',`phone`='$phone',`email`='$email' WHERE `control_id` = 1");


}elseif ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Retrieve form data
    $smsapi = $_POST["smsapi"];
    $eventImage = $_FILES["eventimage"];
    $announcementImage = $_FILES["announcementimage"];

    // Handle Event Image
    if ($eventImage["size"] > 0) {
        $eventTargetDir = "../event_images/";
        $eventTargetFile = $eventTargetDir . basename($eventImage["name"]);
        $eventImageName = basename($eventImage["name"]);

        move_uploaded_file($eventImage["tmp_name"], $eventTargetFile);
    } else {
        // Set default or handle if no image is selected for Event
        $eventImageName = ""; // You can set a default image name or handle it as per your requirement
    }

    // Handle Announcement Image
    if ($announcementImage["size"] > 0) {
        $announcementTargetDir = "../announcement_images/";
        $announcementTargetFile = $announcementTargetDir . basename($announcementImage["name"]);
        $announcementImageName = basename($announcementImage["name"]);

        move_uploaded_file($announcementImage["tmp_name"], $announcementTargetFile);
    } else {
        // Set default or handle if no image is selected for Announcement
        $announcementImageName = ""; // You can set a default image name or handle it as per your requirement
    }

    // Update control table with SMS API key and image names
    $updateOtherPanel = mysqli_query($db, "UPDATE `control` SET `eventimage`='$eventImageName', `announcementimage`='$announcementImageName', `smsapi` = '$smsapi' WHERE `control_id` = 1");

    if ($updateOtherPanel) {
        // Success
        $_SESSION['status'] = "Changes applied successfully!";
        $_SESSION['code'] = "success";
        header("Location: ../controls.php");
    } else {
        // Error
        echo "Error updating control: " . mysqli_error($db);
    }
}

if ($updateReservationPanel || $updateSociaMediaPanel || $updateOtherPanel) {
    $_SESSION['status'] = "Changes Applied Successfully";
    $_SESSION['code'] = "success";

    header("Location: ../controls.php");
}else {
    echo "<script>alert('Error creating changes');</script>";
    echo "<script>window.location.href='../controls.php';</script>";
}
$db->close();
?>