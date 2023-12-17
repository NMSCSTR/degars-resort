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
        
        $per = 8;
        $rts = $_GET['totalamount'] * 100;
        $minus = ($per / 100) * $rts;
        $toberefunds = ($rts - $minus) / 100;
        $toberefund =  $toberefunds / 100;
    } else {
        $per = 8;
        $rts = $_GET['rates'];
        $minus = ($per / 100) * $rts;
        $toberefund = $rts - $minus;
    }
    

   

    

    include '../portHeader.php';
?>

<title>Degars | Request Refund</title>

<main>
    <div class="container-sm mt-5">
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
                        <label for="exampleFormControlInput1" class="form-label">Transaction Reference</label>
                        <input type="text" class="form-control" name="transaction_ref" value="<?php echo $tr ?>"
                            id="exampleFormControlInput1" placeholder="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Amount to be refunded</label>
                        <input type="text" class="form-control" name="refundedamount"
                            value="<?php echo number_format($toberefund, 2) ?>" id="exampleFormControlInput1" placeholder="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Reason</label>
                        <textarea class="form-control" name="reason" id="exampleFormControlTextarea1"
                            rows="5"></textarea>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="check.php" class="btn btn-outline-danger"><i class="fas fa-undo"></i> Back</a>
                        <div class="vr"></div>
                        <button type="submit" class="btn btn-dark" name="reqrefund">Send <i
                                class="fas fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include '../portFooter.php';?>