<?php
    session_start();
    $db = mysqli_connect("localhost","root","","capstwo");

    $walkin_id  = $_GET['walkin_id'];
    $wcustomer_id  = $_GET['wcustomer_id'];

    $fwalkin = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `walkin` WHERE `walkin_id` = '$walkin_id'"));
    $fwcustomer = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `walkincustomer` WHERE `wcustomer_id` = '$wcustomer_id'"));
    
    $entrancefee = $fwalkin['entrancefee'];
    $numberofheads = $fwalkin['numberofheads'];
    $aminities_id = $fwalkin['aminities_id'];
    $firstname = $fwcustomer['firstname'];
    $lastname = $fwcustomer['lastname'];
    
    $faminities = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `aminities` WHERE `aminities_id` = '$aminities_id'"));
    $name = $faminities['name'];

    $totalentrancefee = number_format($entrancefee * $numberofheads , 2);

    if ($aminities_id != 0 && $aminities_id != "") {
        $rates = $faminities['rates'];
        $gettotalamount = number_format(($entrancefee * $numberofheads) + $rates, 2);
        
    } else {
        $gettotalamount = number_format(($entrancefee * $numberofheads), 2);
        $rates = $faminities['rates'];
    }

    include '../portHeader.php';
?>

<title>Degars | Walkin Review</title>

<main>
    <section>
        <div class="container border-0 py-3">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10 col-xl-8">
                    <div class="card border-0">
                        <div class="card-body p-md-5">
                            <div>
                                <h4>Walk-In Reservation</h4>
                                <p class="text-muted pb-2">
                                    Please make payment via e-wallets without worrying service fee. Before you
                                    proceed make sure to have enough balance on your e-wallet/e-cards.
                                </p>
                            </div>
                            <div
                                class="px-3 py-4 border border-primary border-2 rounded mt-4 d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <h1><i class="fas fa-user"></i> </h1>
                                    <div class="d-flex flex-column ms-4">
                                        <span class="h5 mb-1"><?php echo $firstname?> <?php echo $lastname ?></span>
                                        <span class="small text-muted">Over all total</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    <sup class="dollar font-weight-bold text-muted">₱</sup>
                                    <span class="h2 mx-1 mb-0"><?php echo $gettotalamount ?></span>
                                    <!-- <span class="text-muted font-weight-bold mt-2">/ year</span> -->
                                </div>
                            </div>
                            <h4 class="mt-5">Transaction Details</h4>
                            <div class="mt-4 d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-row align-items-center">
                                    <h1><i class="fas fa-door-open"></i></h2>
                                        <div class="d-flex flex-column ms-3">
                                            <span class="h5 mb-1">Entrance Fee</span>
                                            <span class="small text-muted">Number of people |
                                                <?php echo $numberofheads ?> x <?php echo $entrancefee ?></span>
                                        </div>
                                </div>
                                <div>
                                    <input type="text" class="form-control border-0"
                                        value="<?php echo $totalentrancefee ?>" placeholder="CVC" style="width: 90px;"
                                        readonly />
                                </div>
                            </div>

                            <div class="mt-2 d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-row align-items-center">
                                    <h1><i class="fas fa-campground"></i></h1>
                                    <div class="d-flex flex-column ms-3">
                                        <span class="h5 mb-1">Aminities</span>
                                        <span class="small text-muted"><?php echo $faminities['name'];?></span>
                                    </div>
                                </div>
                                <div>
                                    <input type="text" class="form-control border-0"
                                        value="<?php echo number_format($rates, 2) ?>" placeholder=""
                                        style="width: 90px;" readonly />
                                </div>
                            </div>
                            <form action="../functions/savewtransaction.php" method="post">
                                <input type="hidden" name="totalentrancefee" value="<?php echo $totalentrancefee ?>">
                                <input type="hidden" name="aminities_id" value="<?php echo $aminities_id ?>">
                                <input type="hidden" name="walkin_id" value="<?php echo $walkin_id ?>">
                                <input type="hidden" name="wcustomer_id" value="<?php echo $wcustomer_id ?>">
                                <input type="hidden" name="status" value="Pending">
                                <input type="hidden" name="totalamount" value="<?php echo $gettotalamount ?>">
                                <div class="mt-3 d-flex justify-content-end gap-2">
                                <a href="../functions/wcancel.php?walkin_id=<?php echo $walkin_id; ?>&wcustomer_id=<?php echo $wcustomer_id; ?>"
                                        onclick="return confirm('Cancel reservation? Your current reservation will be undone')"
                                        class="btn btn-danger">
                                        <i class="fas fa-times"></i>
                                        Cancel
                                    </a>
                                    <div class="vr"> </div>
                                    <button type="submit" name="savewtransaction"
                                        onclick="return confirm('Make sure to have remaining balance before proceeding')"
                                        class="btn btn-primary btn-block btn-lg">
                                        Proceed to payment <i class="fas fa-long-arrow-alt-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include '../portFooter.php';?>