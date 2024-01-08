<?php
    session_start();
    $db = mysqli_connect("localhost","root","","capstwo");
    $p = $_GET['payment_id'];
    $s = $_GET['reservation_id'];
    $tr = $_GET['transaction_ref'];
    $c = $_GET['customer_id'];
    $r = $_GET['reservation_id'];
    $cr = $_GET['comres_id'];
    $cid = $_GET['checkout_id'];
    $d = $_GET['modeofpayment'];
    if ($d === "50% Downpayment") {
        
        $fee = 8;
        $rates = $_GET['rates'];
        $minus = ($fee / 100 ) * $rates;
        $totalamount = $_GET['totalamount']  / 100;
        $balancetorefund = $totalamount - $minus;


    } else {
        $fee = 8;
        $rates = $_GET['rates'];
        $minus = ($fee / 100) * $rates;
        $balancetorefund = $rates - $minus;
    }
    

   

    

    include '../portHeader.php';
?>
<title>Degars | Request Refund</title>
<main>
    <div class="container-sm mt-5 col-12">
        <div class="card border-0">
            <div class="card-body">
                <h4>Refund Form</h3>
                    <hr>
                    <form action="../functions/saverequestrefund.php" method="post">
                        <div hidden class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">comres_id</label>
                            <input type="text" class="form-control" name="comres_id" value="<?php echo $cr ?>"
                                id="exampleFormControlInput1" placeholder="" readonly>
                        </div>
                        <div hidden class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">cus_id</label>
                            <input type="text" class="form-control" name="customer_id" value="<?php echo $c ?>"
                                id="exampleFormControlInput1" placeholder="" readonly>
                        </div>
                        <div hidden class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">res_id</label>
                            <input type="text" class="form-control" name="reservation_id" value="<?php echo $r ?>"
                                id="exampleFormControlInput1" placeholder="" readonly>
                        </div>
                        <div hidden class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">pay_id</label>
                            <input type="text" class="form-control" name="payment_id" value="<?php echo $p ?>"
                                id="exampleFormControlInput1" placeholder="" readonly>
                        </div>
                        <div class="mb-3">
                            <?php 
                        if ($p == null) { ?>
                            <p class="text-danger">Refund request is not allowed at this moment. Please try again next
                                time!</p>
                            <?php } ?>
                            <label for="exampleFormControlInput1" class="form-label">Transaction Reference</label>
                            <input type="text" class="form-control" name="transaction_ref" value="<?php echo $tr ?>"
                                id="exampleFormControlInput1" placeholder="" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Amount to be refunded</label>
                            <input type="text" class="form-control" name="refundedamount"
                                value="<?php echo number_format($balancetorefund, 2) ?>" id="exampleFormControlInput1"
                                placeholder="" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Reason</label>
                            <textarea class="form-control" name="reason" id="exampleFormControlTextarea1" rows="5"
                                required></textarea>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="check.php?transaction_ref=<?php echo $tr ?>" class="btn btn-outline-danger"><i class="fas fa-undo"></i>
                                Back</a>
                            <div class="vr"></div>
                            <?php 
                        if ($p == null) { ?>
                            <button disabled type="submit" class="btn btn-dark" name="reqrefund">Send <i class="fas fa-pafee-plane"></i></button>
                        <?php } else { ?>
                            <button type="submit" class="btn btn-dark" name="reqrefund">Send <i class="fas fa-pafee-plane"></i></button>
                        <?php } ?>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</main>

<?php include '../portFooter.php';?>