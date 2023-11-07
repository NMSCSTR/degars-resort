<?php 
session_start();
include '../portHeader.php';
// $type = $_SESSION['reservation_type'];
// $eventname = $_SESSION['reservation_eventname'];
// $reservationdate = $_SESSION['reservation_date'];
// $paymentduedate = $_SESSION['reservation_paymentduedate'];
// $rates = $_SESSION['reservation_rates'];
?>

<title>Exclusive | Customer Form</title>

<main>
    <div class="container-sm mt-5">
        <div class="row g-0 position-relative">
            <div class="col-md-6 mb-md-0 p-md-4">
            <?php include_once 'svgbg2.php'?>
            </div>
            <div class="col-md-6 p-4 ps-md-0">
                <h3 class="mt-0 fw-bold"><i class="fas fa-calendar-alt"></i> Please fill up this form</h3>
                <hr>
                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control fw-bold" id="floatingInput" value="Rhondel" placeholder="Firstname">
                        <label for="floatingInput"><i class="fas fa-user"></i> Firstname </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control fw-bold" id="floatingInput" value="Pagobo" placeholder="Lastname">
                        <label for="floatingInput"><i class="fas fa-user"></i> Lastname </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control fw-bold" id="floatingInput" value="rhondelpagobo99@gmail.com" placeholder="Email address">
                        <label for="floatingInput"><i class="fas fa-envelope"></i> Email Address </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control fw-bold" value="09506587329" id="floatingInput" placeholder="Mobile number">
                        <label for="floatingInput"><i class="fas fa-mobile-alt"></i> Mobile Number</label>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="http://192.168.1.4/degars-resort/portal/exclusive/exclusivebooking.php" class="btn btn-outline-danger"><i class="fas fa-arrow-left"></i> Back</a>
                        <div class="vr"></div>
                        <a href="http://192.168.1.4/degars-resort/portal/exclusive/review.php" class="btn btn-dark" name="submitExclusiveReservation">Proceed <i class="fas fa-arrow-right"></i></a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>

<?php include '../portFooter.php';?>