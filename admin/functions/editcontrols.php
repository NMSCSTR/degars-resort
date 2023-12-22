<?php
$db = mysqli_connect('localhost', 'root', '', 'capstwo');
if (isset($_POST['reservationPanel'])) {
    $package1_imagelink = $_POST['package1_imagelink'];
    $package2_imagelink = $_POST['package2_imagelink'];
    $package1_rate = $_POST['package1_rate'];
    $package2_rate = $_POST['package2_rate'];
    $exclusiverate = $_POST['exclusiverate'];
    $entrancefee = $_POST['entrancefee'];

    $updateReservationPanel = mysqli_query($db, "UPDATE `control` SET `entrancefee`='$entrancefee ',`package1_rate`='$package1_rate',`package1_imagelink`='$package1_imagelink',`package2_rate`='$package2_rate',`package2_imagelink`='$package2_imagelink',`exclusiverate`='$exclusiverate ' WHERE `control_id` = 1");

}elseif (isset($_POST['socialMediaPanel'])) {
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $updateSociaMediaPanel = mysqli_query($db, "UPDATE `control` SET `facebook`='$facebook ',`instagram`='$instagram',`phone`='$phone',`email`='$email' WHERE `control_id` = 1");


}elseif (isset($_POST['otherPanel'])) {
    $eventimage = $_POST['eventimage'];
    $announcementimage = $_POST['announcementimage'];

    $updateOtherPanel = mysqli_query($db, "UPDATE `control` SET `eventimage`='$eventimage',`announcementimage`='$announcementimage' WHERE `control_id` = 1");
}

if ($updateReservationPanel || $updateSociaMediaPanel || $updateOtherPanel) {
    echo "<script>alert('Changes applied successfully');</script>";
    echo "<script>window.location.href='../controls.php';</script>";
}else {
    echo "<script>alert('Error creating changes');</script>";
    echo "<script>window.location.href='../controls.php';</script>";
}
$db->close();
?>