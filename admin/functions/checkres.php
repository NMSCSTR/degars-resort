<?php 
$db = mysqli_connect("localhost","root","","capstwo");
if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    $fetchex = mysqli_fetch_assoc(mysqli_query($db,"
    SELECT
        cr.comres_id,
        cr.transaction_ref,
        cr.modeofpayment,
        cr.status,
        cr.servicefee,
        cr.totalamount,
        cr.checkout_id,
        cr.checkouturl,
        cr.dateadded,
        reservation.reservation_id,
        reservation.type,
        reservation.eventname,
        reservation.reservationdate,
        reservation.paymentduedate,
        reservation.rates,
        customer.customer_id,
        customer.firstname,
        customer.lastname,
        customer.email_address,
        customer.phone_number
    FROM
        completed_reservation AS cr
    LEFT JOIN
        reservation ON reservation.reservation_id = cr.reservation_id
    LEFT JOIN
        customer ON customer.customer_id = cr.customer_id
    WHERE 
        cr.transaction_ref = '$search'"
));
}

?>