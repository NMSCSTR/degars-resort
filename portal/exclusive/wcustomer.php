<?php
    session_start();
    $db = mysqli_connect("localhost","root","","capstwo");

    $walkin_id  = $_GET['walkin_id'];

    include '../portHeader.php';
?>

<title>Exclusive | Customer Form</title>

<main>
    <div class="container-sm mt-5">
        <div class="row g-0 position-relative">
            </div>
            <div class="container-fluid col-md-6 p-4 ps-md-0">
                <h4 class="mt-0 fw-bold"><i class="fas fa-calendar-alt"></i> Walkin Customer Form</h4>
                <hr>
                <form action="../functions/savewcustomer.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="hidden" name="walkin_id" class="form-control fw-bold" id="floatingInput"
                            value="<?php echo $walkin_id; ?>" placeholder="">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="firstname" class="form-control fw-bold" id="floatingInput" value=""
                            placeholder="Firstname" required>
                        <label for="floatingInput"><i class="fas fa-user"></i> Firstname </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="lastname" class="form-control fw-bold" id="floatingInput" value=""
                            placeholder="Lastname" required>
                        <label for="floatingInput"><i class="fas fa-user"></i> Lastname </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email_address" class="form-control fw-bold" id="floatingInput"
                            value="" placeholder="Email address" required>
                        <label for="floatingInput"><i class="fas fa-envelope"></i> Email Address </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="phone_number" class="form-control fw-bold" value=""
                            id="floatingInput" placeholder="Mobile number" required>
                        <label for="floatingInput"><i class="fas fa-phone text-dark"></i>

                            Mobile Number</label>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="../exclusive/walkin.php"
                            class="btn btn-outline-danger"><i class="fas fa-undo text-dark"></i> Back</a>
                        <div class="vr"></div>
                        <button type="submit" class="btn btn-dark" name="savewcustomer">Submit <i
                                class="fas fa-check-circle"></i></button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>

<?php include '../portFooter.php';?>