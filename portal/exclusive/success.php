<header>
    <?php include '../portHeader.php';?>
    <title>Success</title>
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
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
            <linearGradient id="IMoH7gpu5un5Dx2vID39Ra_pIPl8tqh3igN_gr1" x1="9.858" x2="38.142" y1="9.858" y2="38.142"
                gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#9dffce"></stop>
                <stop offset="1" stop-color="#50d18d"></stop>
            </linearGradient>
            <path fill="url(#IMoH7gpu5un5Dx2vID39Ra_pIPl8tqh3igN_gr1)"
                d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path>
            <linearGradient id="IMoH7gpu5un5Dx2vID39Rb_pIPl8tqh3igN_gr2" x1="13" x2="36" y1="24.793" y2="24.793"
                gradientUnits="userSpaceOnUse">
                <stop offset=".824" stop-color="#135d36"></stop>
                <stop offset=".931" stop-color="#125933"></stop>
                <stop offset="1" stop-color="#11522f"></stop>
            </linearGradient>
            <path fill="url(#IMoH7gpu5un5Dx2vID39Rb_pIPl8tqh3igN_gr2)"
                d="M21.293,32.707l-8-8c-0.391-0.391-0.391-1.024,0-1.414l1.414-1.414	c0.391-0.391,1.024-0.391,1.414,0L22,27.758l10.879-10.879c0.391-0.391,1.024-0.391,1.414,0l1.414,1.414	c0.391,0.391,0.391,1.024,0,1.414l-13,13C22.317,33.098,21.683,33.098,21.293,32.707z">
            </path>
        </svg>
    </div>
    <?php 
    $db = mysqli_connect("localhost","root","","capstwo");
    $customer_id = $_GET['customer_id'];
    $reservation_id = $_GET['reservation_id'];
    $f = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `completed_reservation` WHERE customer_id = '$customer_id' "));
    $refno = $f['transaction_ref'];

    $c = mysqli_query($db, "UPDATE `completed_reservation` SET `status` ='Approved' WHERE `customer_id` = $customer_id AND `reservation_id` = $reservation_id ");

    ?>
    <h1 class="text-center fw-bolder">Congratulations!</h1><br>
    <p class="card-text text-dark text-center h5">Your <span class="text-danger">Degar's Resort Reservation</span>  transaction is successful! Please take a screenshot or copy your transaction reference.</p><br>
    <p class="card-text text-dark text-center h5">Transaction Reference: <span class="text-danger fw-bold"><?= $refno ?></span></p><br>
    <p><a href="http://192.168.1.4/degars-resort/portal/quickstart.php" class="d-sm-flex justify-content-center">Back to home page.</a></p>

    
</section>


<footer>
    <?php include '../portFooter.php';?>
</footer>