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
    if ($updateReservationPanel) {
        $_SESSION['status'] = "Changes applied successfully!";
        $_SESSION['code'] = "success";
        header("Location: ../controls.php");

    }

}elseif (isset($_POST['socialMediaPanel'])) {

    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $updateSociaMediaPanel = mysqli_query($db, "UPDATE `control` SET `facebook`='$facebook ',`instagram`='$instagram',`phone`='$phone',`email`='$email' WHERE `control_id` = 1");
    if ($updateSociaMediaPanel) {
        $_SESSION['status'] = "Changes applied successfully!";
        $_SESSION['code'] = "success";
        header("Location: ../controls.php");

    }


}elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

// Retrieve form data
$smsapi = $_POST["smsapi"];
$eventImage = $_FILES["eventimage"];
$announcementImage = $_FILES["announcementimage"];

// Handle Event Image
$eventImageName = "";
if ($eventImage["size"] > 0) {
    $eventImageName = handleImageUpload($eventImage, "../event_images/");
    replaceAndDeleteOldImage($db, $eventImageName, "event_images/");
}

// Handle Announcement Image
$announcementImageName = "";
if ($announcementImage["size"] > 0) {
    $announcementImageName = handleImageUpload($announcementImage, "../announcement_images/");
    replaceAndDeleteOldImage($db, $announcementImageName, "announcement_images/");
}

// Update control table with SMS API key and image names
$updateOtherPanel = mysqli_query($db, "UPDATE `control` SET `eventimage`='$eventImageName', `announcementimage`='$announcementImageName', `smsapi` = '$smsapi' WHERE `control_id` = 1");

if ($updateOtherPanel) {
    // Success
    $_SESSION['status'] = "Changes applied successfully!";
    $_SESSION['code'] = "success";
    unlinkOldImages($db, "event_images/");
    unlinkOldImages($db, "announcement_images/");
    header("Location: ../controls.php");
} else {
    // Error
    echo "Error updating control: " . mysqli_error($db);
}
}

function handleImageUpload($image, $targetDir) {
$targetFile = $targetDir . basename($image["name"]);
$imageName = basename($image["name"]);

move_uploaded_file($image["tmp_name"], $targetFile);

return $imageName;
}

function replaceAndDeleteOldImage($db, $imageName, $targetDir) {
if (!empty($imageName)) {
    $existingImageQuery = mysqli_query($db, "SELECT * FROM `control` WHERE `control_id` = 1");
    $existingImageRow = mysqli_fetch_assoc($existingImageQuery);
    $existingImagePath = $targetDir . $existingImageRow[$imageName];

    if (file_exists($existingImagePath)) {
        unlink($existingImagePath);
    }
}
}

function unlinkOldImages($db, $targetDir) {
$existingImageQuery = mysqli_query($db, "SELECT * FROM `control` WHERE `control_id` = 1");
$existingImageRow = mysqli_fetch_assoc($existingImageQuery);
$existingEventImagePath = $targetDir . $existingImageRow['eventimage'];
$existingAnnouncementImagePath = $targetDir . $existingImageRow['announcementimage'];

if (file_exists($existingEventImagePath)) {
    unlink($existingEventImagePath);
}

if (file_exists($existingAnnouncementImagePath)) {
    unlink($existingAnnouncementImagePath);
}
}
?>
