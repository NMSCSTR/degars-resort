<?php include '../portHeader.php';?>
<title>Exclusive | Review Reservation</title>
<main>
        <div class="container-sm mt-4">
            <h3 class="mt-0 fw-bold"><i class="fas fa-calendar-alt"></i> Review Reservation</h3>
            <hr>

            <section class="h-100 gradient-custom">
                <div class="container">
                    <div class="row d-flex justify-content-center my-4">
                        <div class="col-md-8">
                            <div class="card mb-4">
                                <div class="card-header bg-dark text-white py-3">
                                    <h5 class="mb-0">Reservation Details</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                            <p class="text-start">Exclusive Reservation</p>
                                            <div class="col-lg-4 col-md-6">
                                                <p class="text-sm-center">
                                                    <strong>&#8369; 200.00</strong>
                                                </p>
                                            </div>
                                        </li>
                                        <hr>
                                        <p><strong>Customer Details</strong></p>
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                            <p class="text-start">Name</p>
                                            <div class="col-lg-4 col-md-6">
                                                <p class="text-sm-center">
                                                    <strong>Rhondel M. Pagobo</strong>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                            <p class="text-start">Email Address</p>
                                            <div class="col-lg-4 col-md-6">
                                                <p class="text-sm-center">
                                                    <strong>rhondelpagobo99@gmail.com</strong>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                            <p class="text-start">Mobile Number</p>
                                            <div class="col-lg-4 col-md-6">
                                                <p class="text-sm-center">
                                                    <strong>09506587329</strong>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="card mb-4">
                                <div class="card-body">
                                    <p><strong>Expected payment due</strong>( 3 days before reservation date)</p>
                                    <p class="mb-0">July 16, 2023</p>
                                </div>
                            </div>
                            
                            <div class="card mb-4 mb-lg-0">
                                <?php include_once 'weaccept.php'?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-header bg-dark text-white py-3">
                                    <h5 class="mb-0">Summary</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                            Exclusive Reservation Fee
                                            <span>&#8369; 200.00</span>
                                        </li>
                                        <!-- <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                            Purchased Products
                                            <span>&#8369; 1,300.00</span>
                                        </li> -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            Fees (2.5%)
                                            <span>&#8369; 5.00</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                                            <div>
                                                <strong>Total amount</strong>
                                            </div>
                                            <span><strong>&#8369; 205.00</strong></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                            <div>
                                                <strong>Allowed to pay at least 50%</strong>
                                            </div>
                                            <span><strong>&#8369; 102.6</strong></span>
                                        </li>
                                    </ul>
                                    
                                    <div class="form-floating mb-3">
                                        <select class="form-select text-capitalize fw-bold" id="floatingSelect" aria-label="Floating label select example">
                                            <option selected>Select mode of payment</option>
                                            <option value="">50% downpayment</option>
                                            <option value="">Full Payment</option>
                                        </select>
                                        <label for="floatingSelect">Mode of payment</label>
                                    </div>
                                    
                                    <div class="d-grid gap-2 mb-3">
                                        <a href="../../billing.php" class="btn btn-success">
                                            <i class="fas fa-credit-card"></i>
                                            Go to checkout
                                        </a>
                                    </div>
                                    
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
                                        <a href="http://192.168.1.4/degars-resort/portal/exclusive/payviaqr.php" class="btn btn-outline-primary">
                                            <i class="fas fa-qrcode text-dark"></i>
                                            Pay Via QR
                                        </a>
                                        <div class="vr"></div>
                                        <a href="http://192.168.1.4/degars-resort/portal/exclusive/payviaqr.php" class="btn btn-danger">
                                            <i class="fas fa-clock"></i>
                                            Pay later
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h6 class="mb-0"><a href="exclusivebooking.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i> Back to reservation</a></h6>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
<?php include '../portFooter.php'; ?>