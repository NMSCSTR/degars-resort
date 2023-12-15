<header>
    <?php include '../portHeader.php';?>
    <title>Degar's Resort | Failed</title>
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
</header>

<section class="py-5">
    <div class="img-fluid mx-auto d-block d-flex justify-content-center align-items-center py-5">
        <i class="fas fa-times-circle text-danger" style="font-size: 100px;"></i>
    </div>
    <?php 
    $db = mysqli_connect("localhost","root","","capstwo");
    $customer_id = $_GET['customer_id'];
    $reservation_id = $_GET['reservation_id'];
    $f = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `completed_reservation` WHERE customer_id = '$customer_id' "));
    $refno = $f['transaction_ref'];

    

    ?>
    <h1 class="text-center fw-bolder">Reservation Failed</h1><br>
    <p class="card-text text-dark text-center h5">Your Degar's Resort Reservation
        transaction was unsuccessful! Copy or take a screenshot your transaction reference. </p><br>
    <p class="card-text text-dark text-center h5">Transaction Reference: <span class="text-danger fw-bold"><?= $refno ?></span></p>
    <div class="container-fluid col-lg-10 d-md-flex justify-content-center"><br><br>
    <p><a href="#">Back to home page.</a></p>
    </div>
</section>


<footer>
    <?php include '../portFooter.php';?>
</footer>