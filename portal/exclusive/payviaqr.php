<?php
include '../portHeader.php';
$db = mysqli_connect("localhost","root","","capstwo");
$reservation_id = $_GET['reservation_id'];
$customer_id = $_GET['customer_id'];
$type = $_GET['type'];

$fetch_res_details = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `reservation` WHERE reservation_id = '$reservation_id' "));
$fetch_cus_details = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `customer` WHERE customer_id = '$customer_id' "));

?>
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
            <div class="col-md-6 img-fluid mt-4">
                <img src="../../res/images/gcashQR.png" class="img-fluid" alt="" width="300" height="300">
            </div>
            <div class="col-sm-6 p-4 ps-md-0 ">
                <h3 class="mt-0 fw-bold"><i class="fas fa-calendar-alt"></i> Upload Payment Proof</h3>
                <hr>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-light text-secondary">
                        <h5 class="mb-0">Summary</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total amount to pay</strong>
                                </div>
                                <span><strong><span>&#8369;
                                            <?php echo number_format($fetch_res_details['rates'], 2); ?></span></strong></span>
                            </li>
                            <hr>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="review.php?customer_id=<?php echo $customer_id ?>&reservation_id=<?php echo $reservation_id ?>"
                                    class="btn btn-outline-danger">
                                    Back
                                </a>
                                <div class="vr"></div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    Upload Receipt
                                </button>
                            </div>
                    </div>
                    </ul>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade shadow" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <form action="../functions/saveqr.php" method="post" enctype="multipart/form-data">
                    <div class="modal-dialog modal-dialog-centered modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel"><i
                                        class="fas fa-cloud-upload-alt"></i> Upload Receipt</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-danger text-wrap">Note: Please input the exact amount when you pay.
                                    We will
                                    review submitted
                                    receipt before approval.</p>
                                <div class="container mb-2 d-flex justify-content-center">
                                    <img class="img-fluid" id="viewImg" src=""
                                        alt="">
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="file" name="image" id="image"
                                        class="form-control text-uppercase fw-bold" required>
                                    <label for="floatingInput"> Upload receipt</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select text-capitalize fw-bold" id="floatingSelect"
                                        aria-label="Floating label select example"
                                        name="modeofpayment" required>
                                        <option disabled selected>Open this select menu</option>
                                        <option value="50% Downpayment">50% Downpayment</option>
                                        <option value="Full Payment">Full Payment</option>
                                    </select>
                                    <label for="floatingSelect"> Select Payment</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="gcash_name" class="form-control fw-bold" id="floatingInput"
                                        value="" placeholder="Gcash Name" required>
                                    <label for="floatingInput"><i class="fas fa-user"></i> Gcash Fullname </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="gcash_number" class="form-control fw-bold" value=""
                                        id="floatingInput" placeholder="Gcash number" required>
                                    <label for="floatingInput"><i class="fas fa-phone text-dark"></i>

                                        Gcash Number</label>
                                </div>
                            </div>
                            <input type="hidden" name="customer_id" value="<?php echo $customer_id ?>">
                            <input type="hidden" name="reservation_id" value="<?php echo $reservation_id ?>">
                            <input type="hidden" name="totalamount" value="<?php echo $fetch_res_details['rates'] ?>">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-dark"><i class="fas fa-paper-plane"></i>
                                    Send Receipt</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</main>
<script>
let viewImg = document.getElementById('viewImg');
let inputImg = document.getElementById('image');

inputImg.onchange = (e) => {
    if (inputImg.files[0])
        viewImg.src = URL.createObjectURL(inputImg.files[0]);
};
</script>
<?php include '../portFooter.php';?>