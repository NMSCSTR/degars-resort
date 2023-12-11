<?php
    session_start();
    $db = mysqli_connect("localhost","root","","capstwo");

    $exc_res_id  = $_GET['reservation_id'];

    include '../portHeader.php';
?>

<title>Exclusive | Customer Form</title>

<main>
    <div class="container-sm mt-5">
        <div class="row g-0 position-relative">
            <div class="col-md-6 mb-md-0 p-md-4">
           
            <?php include_once 'svgbg2.php'?>
            </div>
            <div class="col-md-6 p-4 ps-md-0">
                <h4 class="mt-0 fw-bold"><i class="fas fa-calendar-alt"></i> Customer Form</h4>
                <hr>
                <form action="../functions/savecustomer.php" method="post">
                <div class="form-floating mb-3">
                        <input type="text" name="reservation_id" class="form-control fw-bold" id="floatingInput" value="<?php echo $exc_res_id; ?>" placeholder="reservation id">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="firstname" class="form-control fw-bold" id="floatingInput" value="" placeholder="Firstname" required>
                        <label for="floatingInput"><i class="fas fa-user"></i> Firstname </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="lastname" class="form-control fw-bold" id="floatingInput" value="" placeholder="Lastname" required>
                        <label for="floatingInput"><i class="fas fa-user"></i> Lastname </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email_address" class="form-control fw-bold" id="floatingInput" value="" placeholder="Email address" required>
                        <label for="floatingInput"><i class="fas fa-envelope"></i> Email Address </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="phone_number" class="form-control fw-bold" value="+63" id="floatingInput" placeholder="Mobile number" required>
                        <label for="floatingInput"><i class="fas fa-mobile-alt"></i> Mobile Number</label>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="http://192.168.1.4/degars-resort/portal/exclusive/exclusivebooking.php"class="btn btn-outline-danger">Back</a>
                        <div class="vr"></div>
                        <button type="submit" class="btn btn-dark" name="savecustomer">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>

<?php include '../portFooter.php';?>