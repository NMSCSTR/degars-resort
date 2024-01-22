<?php
$db = mysqli_connect('localhost', 'root', '', 'capstwo');

if (isset($_POST["reservationdate"])) {
    $sql = "SELECT
                reservation.reservationdate,
                completed_reservation.status
            FROM
                completed_reservation
            LEFT JOIN
                reservation ON reservation.reservation_id = completed_reservation.reservation_id
            WHERE 
                (reservation.reservationdate = '" . $_POST["reservationdate"] . "' AND completed_reservation.status = 'Approved') OR
                reservation.reservationdate = '" . $_POST["reservationdate"] . "' AND completed_reservation.status = 'Approved:QR'";


            $result = mysqli_query($db, $sql);
            if (mysqli_num_rows($result)) {
                echo '<span class="text-danger">Date already reserved! Please choose another date.</span>';
                echo '<script>document.getElementById("forDisabled").disabled = true;</script>';
            } else {
                echo '<span class="text-success">Date Available!</span>';
                echo '<script>document.getElementById("forDisabled").disabled = false;</script>';
            }
}
?>
