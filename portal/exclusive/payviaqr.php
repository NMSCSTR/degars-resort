<?php include '../portHeader.php';?>
<title>Exclusive | Pay Via Qr</title>
<style>
html {
    height: 100%;
}

body {
    min-height: 100%;
    display: flex;
    flex-direction: column;
}

.bd-footer {
    margin-top: auto;
}
</style>
<main>
    <div class="container-sm mt-5">
        <div class="row g-0 position-relative">
            <div class="col-md-6 mb-md-0 p-md-4 mb-4">
                <img src="../../res/images/qr1.png" class="img-fluid" alt="">
            </div>
            <div class="col-sm-6 p-4 ps-md-0 ">
                <h3 class="mt-0 fw-bold"><i class="fas fa-calendar-alt"></i> Upload Payment Proof</h3>
                <hr>
                <form action="" method="post">
                    <div class="card mb-4">
                        <div class="card-header py-3 bg-dark text-white">
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
                                        <strong>Total amount to pay</strong>
                                        <!-- <strong>
                                                <p class="mb-0">(including VAT)</p>
                                            </strong> -->
                                    </div>
                                    <span><strong><span>&#8369; 1383.75</span></strong></span>
                                </li>
                                <hr>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Allowed to pay atleast 50%</strong>
                                        <!-- <strong>
                                                <p class="mb-0">(including VAT)</p>
                                            </strong> -->
                                    </div>
                                    <span><strong><span>&#8369; 691.875</span></strong></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <p class="text-danger">Note: Please input the exact amount when you pay. We will review submitted
                        receipt before approval.</p>
                    <div class="form-floating mb-3">
                        <select class="form-select text-capitalize fw-bold" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Open this select menu</option>
                            <option value="1">50% Downpayment</option>
                            <option value="2">Full Payment</option>
                        </select>
                        <label for="floatingSelect"> Select Payment</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control text-uppercase fw-bold" id="floatingInput"
                            placeholder="Event name">
                        <label for="floatingInput"> Upload receipt</label>
                    </div>
                    <div class="d-grid gap-2">
                    <a href="http://192.168.1.4/degars-resort/portal/exclusive/review.php" class="btn btn-outline-danger">
                            Back
                        </a>
                        <a href="http://192.168.1.4/degars-resort/portal/exclusive/success.php" class="btn btn-dark">
                            Submit
                        </a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</main>

<?php include '../portFooter.php';?>