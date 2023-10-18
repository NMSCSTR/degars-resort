<?php include '../portHeader.php';?>
<title>Exclusive | Review Reservation</title>
<main>
    <div class="container-sm mt-4" style="">
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
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    <p class="text-start">Exclusive Reservation</p>
                                    <div class="col-lg-4 col-md-6">
                                        <p class="text-sm-center">
                                            <strong><span>&#8369;</span> 50.00</strong>
                                        </p>
                                    </div>
                                </li>
                                <hr>
                                <p><strong>Customer Details</strong></p>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    <p class="text-start">Name</p>
                                    <div class="col-lg-4 col-md-6">
                                        <p class="text-sm-center">
                                            <strong>Rhondel M. Pagobo</strong>
                                        </p>
                                    </div>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    <p class="text-start">Email Address</p>
                                    <div class="col-lg-4 col-md-6">
                                        <p class="text-sm-center">
                                            <strong>rhondelpagobo99@gmail.com</strong>
                                        </p>
                                    </div>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    <p class="text-start">Mobile Number</p>
                                    <div class="col-lg-4 col-md-6">
                                        <p class="text-sm-center">
                                            <strong>09506587329</strong>
                                        </p>
                                    </div>
                                </li>
                            </div>
                        </div>
                        <!-- <div class="card mb-4">
                            <div class="card-body">
                                <p><strong>Purchase Product</strong></p>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    <p class="text-start">2 CASE BEER</p>
                                    <div class="col-lg-4 col-md-6">
                                        <p class="text-start text-md-center">
                                            <strong><span>&#8369;</span> 1,300.00</strong>
                                        </p>
                                    </div>

                                </li>
                            </div>
                        </div> -->
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
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Exclusive Reservation Fee
                                        <span>&#8369; 50.00</span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Purchased Products
                                        <span>&#8369; 1,300.00</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        Fees(2.5%)
                                        <span>&#8369; 33.75</span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                        <div>
                                            <strong>Total amount</strong>
                                            <!-- <strong>
                                                <p class="mb-0">(including VAT)</p>
                                            </strong> -->
                                        </div>
                                        <span><strong><span>&#8369; 1383.75</span></strong></span>
                                    </li>
                                </ul>
                                <div class="d-grid gap-2">
                                    <a href="http://192.168.1.4/degars-resort/portal/exclusive/payviaqr.php" class="btn btn-outline-warning">
                                        Pay Via Qr
                                    </a>
                                    <a href="http://192.168.1.4/degars-resort/billing.php" class="btn btn-dark">
                                        Go to checkout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-2">
                        <h6 class="mb-0"><a href="exclusivebooking.php" class="text-body"><i
                                    class="fas fa-long-arrow-alt-left me-2"></i>Back to reservation</a></h6>
                    </div>
                </div>
            </div>

        </section>
    </div>
</main>

<?php include '../portFooter.php';?>