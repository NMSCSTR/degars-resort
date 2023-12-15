<?php include '../portHeader.php';?>

<?php 
    $db = mysqli_connect("localhost","root","","capstwo");
    $reservation_id = $_GET['reservation_id'];
    $customer_id = $_GET['customer_id'];
    

    $fetch_res_details = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `reservation` WHERE reservation_id = '$reservation_id' "));

    $fetch_cus_details = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `customer` WHERE customer_id = '$customer_id' "));
?>
<title><?php echo $_GET['type']; ?> | Review Reservation</title>
<main>
    <div class="container-xl mt-4">
        <!-- <h6 class="mt-0 fw-bold pr-4"><i class="fas fa-calendar-alt"></i> Review Reservation</h6>
            <hr> -->
        <section class="h-100 gradient-custom">
            <div class="container">
                <div class="row d-flex justify-content-center my-4">
                    <div class="col-md-8">
                        <div class="card mb-4 shadow">
                            <div class="card-header bg-light text-secondary py-3">
                                <h5 class="mb-0"><i class="far fa-calendar-alt"></i>
                                    Reservation Details</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        <p class="text-start"><?php echo $_GET['type']; ?> Reservation</p>
                                        <div class="col-lg-4 col-md-6">
                                            <p class="text-sm-center">
                                                <strong>&#8369;
                                                    <?php echo number_format($fetch_res_details['rates'], 2); ?></strong>
                                            </p>
                                        </div>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        <p class="text-start">Reservation Date</p>
                                        <div class="col-lg-4 col-md-6">
                                            <p class="text-sm-center">
                                                <strong>
                                                    <?php echo date('F d, Y', strtotime($fetch_res_details['reservationdate'])); ?></strong>
                                            </p>
                                        </div>
                                    </li>
                                    <hr>
                                    <p><strong><i class="fas fa-address-card"></i>
                                            Customer Details</strong></p>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        <p class="text-start">Name</p>
                                        <div class="col-lg-4 col-md-6">
                                            <p class="text-sm-center">
                                                <strong><?php echo $fetch_cus_details['firstname']; ?>
                                                    <?php echo $fetch_cus_details['lastname']; ?></strong>
                                            </p>
                                        </div>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        <p class="text-start">Email Address</p>
                                        <div class="col-lg-4 col-md-6">
                                            <p class="text-sm-center">
                                                <strong><?php echo $fetch_cus_details['email_address']; ?></strong>
                                            </p>
                                        </div>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        <p class="text-start">Mobile Number</p>
                                        <div class="col-lg-4 col-md-6">
                                            <p class="text-sm-center">
                                                <strong><?php echo $fetch_cus_details['phone_number']; ?></strong>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body shadow">
                                <p><strong><i class="fas fa-clock"></i> Expected payment due</strong>( 3 days before
                                    reservation date)</p>
                                <p class="mb-0">
                                    <?php echo date('F d, Y', strtotime($fetch_res_details['paymentduedate'])); ?></p>
                            </div>
                        </div>

                        <div class="card shadow mb-4 mb-lg-0">
                            <?php include_once 'weaccept.php'?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow mb-4">
                            <div class="card-header bg-light text-secondary py-3">
                                <h5 class="mb-0"><i class="far fa-list-alt"></i>
                                    Summary</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        <span class="text-success"><?php echo $_GET['type']; ?> Reservation Fee</span>
                                        <span>&#8369;
                                            <?php echo number_format($fetch_res_details['rates'], 2); ?></span>
                                    </li>
                                    <!-- <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                            Purchased Products
                                            <span>&#8369; 1,300.00</span>
                                        </li> -->
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        Gcash Service Fee (2.5%)
                                        <?php
                                            $resfee = $fetch_res_details['rates'];
                                            $percentage = 0; // 2.5
                                            $servicefee = ($percentage / 100) * $resfee;

                                            $totalamount = $resfee + $servicefee;
                                            $allowedfiftyPerCent = $totalamount / 2;
                                            ?>
                                        <span>&#8369; <?php echo number_format($servicefee, 2) ?></span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                                        <div>
                                            <strong>Total amount</strong>
                                        </div>
                                        <span><strong>&#8369;
                                                <?php echo number_format($totalamount, 2) ?></strong></span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                        <div>
                                            <strong>Allowed to pay at least 50%</strong>
                                        </div>
                                        <span><strong>&#8369;
                                                <?php echo number_format($allowedfiftyPerCent, 2) ?></strong></span>
                                    </li>
                                </ul>

                                <form action="../functions/savecompleted.php" method="post">
                                    <div class="form-floating mb-3">
                                        <input type="hidden" name="reservation_id" class="form-control fw-bold"
                                            id="floatingInput" value="<?php echo $reservation_id; ?>"
                                            placeholder="reservation id">
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="hidden" name="customer_id" class="form-control fw-bold"
                                            id="floatingInput" value="<?php echo $customer_id; ?>"
                                            placeholder="customer id">
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select text-capitalize fw-bold" name="modeofpayment"
                                            id="floatingSelect" aria-label="Floating label select example">
                                            <option value="50% Downpayment">50% downpayment</option>
                                            <option value="Full Payment">Full Payment</option>
                                        </select>
                                        <label for="floatingSelect">Mode of payment</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="hidden" name="servicefee" class="form-control fw-bold"
                                            id="floatingInput" value="<?php echo $servicefee; ?>"
                                            placeholder="customer id">
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="hidden" name="totalamount" class="form-control fw-bold"
                                            id="floatingInput" value="<?php echo $totalamount; ?>"
                                            placeholder="customer id">
                                    </div>
                                    <div class="d-grid gap-2 mb-3">
                                        <button type="submit" onclick="return confirm('Make sure you have remaining balance on Gcash to proceed. Insufficient balance when proceeding will lead into failed transaction!')" name="savecompleted" class="btn btn-success"><i
                                                class="fas fa-credit-card"></i> Go to checkout</button>

                                        <!-- <a href="../../billing.php"class="btn btn-success"><i class="fas fa-credit-card"></i> Go to checkout</a> -->
                                    </div>
                                </form>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-5">
                                            <hr class="my-2">
                                        </div>
                                        <div class="col-2 text-center">or</div>
                                        <div class="col-5">
                                            <hr class="my-2">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center gap-2">
                                    <a href="http://192.168.1.4/degars-resort/portal/quickstart.php"
                                        onclick="return confirm('Back to reservation page?. Your current reservation will be undone')"
                                        class="btn btn-danger">
                                        <i class="fas fa-undo"></i>
                                        Back
                                    </a>

                                    <?php 
                                        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
                                        $payLaterUrl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  
                                        
                                    ?>

                                    <div class="vr"></div>
                                    <a href="http://192.168.1.4/degars-resort/portal/exclusive/payviaqr.php?customer_id=<?php echo $customer_id ?>&reservation_id=<?php echo $reservation_id ?>&type=<?php echo $_GET['type']; ?>"
                                        class="btn btn-outline-primary">
                                        <i class="fas fa-qrcode text-dark"></i>
                                        Pay Via QR
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <h6 class="mb-0">
                            <!-- <a href="exclusivebooking.php" class="text-body mt-4"
                                onclick="Confirm('Back to reservation page?. Your current reservation will be undone')"><i
                                    class="fas fa-long-arrow-alt-left me-2"></i> Back to reservation page
                            </a> -->
                        </h6>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<?php include '../portFooter.php'; ?>