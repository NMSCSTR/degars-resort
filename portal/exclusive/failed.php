<?php include '../portHeader.php';?>
<header>
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
    <div class="img-fluid mx-auto d-block d-flex justify-content-center align-items-center py-3">
        <i class="fas fa-times-circle text-danger" style="font-size: 80px;"></i>
    </div>
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
        $update_result = mysqli_query($db, "UPDATE `walkin_transac` SET `status` ='Pending' WHERE `wcustomer_id` = '$getcustomer' AND `walkin_id` = '$getreservation'");
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
            $update_result = mysqli_query($db, "UPDATE `completed_reservation` SET `status` ='Pending' WHERE `customer_id` = '$getcustomer' AND `reservation_id` = '$getreservation' ");
        } else {
            // Handle the case where no results were found
            echo "No results found for the given customer and reservation.";
        }
    }

    
if ($update_result) {
    // Update successful, proceed with the rest of the code
    $message_content = "Well done! Your reservation was made. Kindly store or keep in mind the transaction reference: {$refno}. If you don't make your payment three days before to the reservation date, your reservation will be cancelled. For further information, please email mariloumercado1955@gmail.com to DEGARS RESORT. We appreciate you making this reservation.";
    
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


    
    <h1 class="text-center fw-bolder">Reservation Failed</h1><br>
    <div class="container">
        <p class="card-text text-dark text-center h5">Your Degar's Resort Reservation
        transaction was place! Copy or take a screenshot your transaction reference and use it next time when you pay for successful reservation.</p><br>
    <p class="card-text text-dark text-center h5">Transaction Reference: <span
            class="text-danger fw-bold"><?= $refno ?></span></p>
    </div>
    
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
            $data = "http://192.168.1.4/degars-resort/portal/exclusive/wcheck.php?transaction_ref={$refno}";
        }
        else {
            $data = "http://192.168.1.4/degars-resort/portal/exclusive/check.php?transaction_ref={$refno}";
        }
        // Call the function to generate and display the QR code
        generateQRCode($data);
    ?>
    <div class="container d-flex justify-content-center">
        <div class="container-fluid col-lg-10 d-md-flex justify-content-center"><br><br>
            <p><a href="../../index.php">Back to home page</a></p>
        </div>
</section>


<footer>
    <?php include '../portFooter.php';?>
</footer>