<?php 
$db = mysqli_connect("localhost", "root", "", "capstwo");
$getControls = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `control` WHERE `control_id` = 1"));

$f_row = null; // Initialize $f_row

if(isset($_GET['walkin_id']) && isset($_GET['wcustomer_id'])){
    $getcustomer = $_GET['wcustomer_id'];
    $getreservation = $_GET['walkin_id'];

    $f_query = mysqli_query($db, "SELECT * FROM `walkin_transac` WHERE wcustomer_id = '$getcustomer' AND walkin_id = '$getreservation'");
    $w_query = mysqli_query($db, "SELECT * FROM `walkincustomer` WHERE wcustomer_id = '$getcustomer' AND walkin_id = '$getreservation'");

    $f_row = mysqli_fetch_assoc($f_query);
    $w_row = mysqli_fetch_assoc($w_query);

    if ($f_row && $w_row) {
        $refno = $f_row['transaction_ref'];
        $phone_number = $w_row['phone_number'];

        // Update completed reservation status to 'Approved'
        $update_result = mysqli_query($db, "UPDATE `walkin_transac` SET `status` ='Approved' WHERE `wcustomer_id` = '$getcustomer' AND `walkin_id` = '$getreservation'");
    } else {
        // Handle the case where no results were found
        echo "No results found for the given customer and reservation.";
    }
}


if (isset($_GET['reservation_id']) && isset($_GET['customer_id'])) {
    $getcustomer = $_GET['customer_id'];
    $getreservation = $_GET['reservation_id'];

    $f = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `completed_reservation` WHERE customer_id = '$getcustomer' AND reservation_id = '$getreservation'"));
    $w = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `customer` WHERE `customer_id` = '$getcustomer' AND `reservation_id` = '$getreservation'"));

    if ($f && $w) {
        $refno = $f['transaction_ref'];
        $phone_number = $w['phone_number'];

        // Update completed reservation status to 'Approved'
        $update_result = mysqli_query($db, "UPDATE `completed_reservation` SET `status` ='Approved' WHERE `customer_id` = '$getcustomer' AND `reservation_id` = '$getreservation' ");
    } else {
        // Handle the case where no results were found
        echo "No results found for the given customer and reservation.";
    }
}




if ($update_result) {
    // Update successful, proceed with the rest of the code
    $message_content = "Congratulations, your reservation was approved successfully. Please remember or save the transaction reference: {$refno}. A copy of your receipt has been emailed to you. If you have any questions about this payment, please contact DEGARS RESORT at mariloumercado1955@gmail.com. Thank you for making your reservation!";
    
    $ch = curl_init();
    $parameters = array(
        'apikey' => $getControls['smsapi'], 
        'number' => $phone_number,
        'message' => $message_content,
        'sendername' => 'SEMAPHORE'
    );

    curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $output = curl_exec($ch);
    curl_close($ch);
    $db->close();
   }   // Rest of your HTML code here
?>
<!-- Your HTML code continues... -->
<?php include '../portHeader.php';?>
<header>
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
    <h1 class="text-center fw-bolder">Congratulations!</h1><br>
    <div class="container">
        <p class="card-text text-dark text-center h5">Your <span class="text-danger">Degar's Resort Reservation</span>  transaction is successful! Please take a screenshot or copy your transaction reference.</p><br>
    <p class="card-text text-dark text-center h5">Transaction Reference: <span class="text-danger fw-bold"><?= $refno ?></span></p>
    </div>
    <br>
    <div class="container">
        <?php 
    // Include the QR Code library
require "phpqrcode/qrlib.php";

// Function to generate and display QR code
function generateQRCode($data) {
    // Set the QR code filename
    $filename = "qrcodes/qrcode.png";

    // Create the directory if it doesn't exist
    $dir = dirname($filename);
    if (!file_exists($dir)) {
        if (!mkdir($dir, 0777, true) && !is_dir($dir)) {
            die('Failed to create directory: ' . $dir);
        }
    }

    // Create a QR code
    QRcode::png($data, $filename, QR_ECLEVEL_L, 5);

    // Check if the image was successfully created
    if (!file_exists($filename)) {
        die('Failed to create QR code image.');
    }
    ?>

    <!-- JavaScript function to handle the download -->
    <script>
            function downloadQR() {
                var link = document.createElement("a");
                link.href = "<?= $filename ?>";
                link.download = "qrcode.png";
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        </script>

    <div class="container-fluid d-flex justify-content-center align-items-center">
    <!-- Display the value of the reference below the QR code -->
    <img src="<?= $filename ?>" alt="QR Code">
    <button class="btn btn-success" onclick="downloadQR()">Download QR Code</button>  
    </div>

<?php 
}

if ($f_row) {
    $data = "http://192.168.51.5/degars-resort/portal/exclusive/wcheck.php?transaction_ref={$refno}";
}
else {
    $data = "http://192.168.51.5/degars-resort/portal/exclusive/check.php?transaction_ref={$refno}";
}
// Example data (replace this with your actual data)


// Call the function to generate and display the QR code
generateQRCode($data);
?>
    </div>
    <p><a href="../../index.php" class="d-lg-flex justify-content-center">Back to home page.</a></p>

</section>

<footer>
    <?php include '../portFooter.php';?>
</footer>
