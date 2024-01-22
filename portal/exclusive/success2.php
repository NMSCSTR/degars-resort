<?php 
$db = mysqli_connect("localhost", "root", "", "capstwo");
?>
<!-- Your HTML code continues... -->
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
    <h1 class="text-center fw-bolder">Congratulations!</h1><br>
    <p class="card-text text-dark text-center h5">Your <span class="text-danger">Degar's Resort Reservation</span>
        transaction is successful! Please take a screenshot or copy your transaction reference.</p><br>
    <p class="card-text text-dark text-center h5">Transaction Reference: <span class="text-danger fw-bold">wref82878c</span></p>
    <br>
    <p><a href="../../index.php" class="d-sm-flex justify-content-center">Back to home page.</a></p>    
    <div class="container d-flex justify-content-center">
    <div class="container d-flex justify-content-center">
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
    <img src="<?= $filename ?>" alt="QR Code"></br>
    <button class="btn btn-success" onclick="downloadQR()">Download QR Code</button> <br>   
    </div>
    <?php
        }

        $data = "http://192.168.51.5/degars-resort/portal/exclusive/wcheck.php?transaction_ref=wref82878c";

        // Call the function to generate and display the QR code
        generateQRCode($data);
    ?>


</div>

</div>


</section>

<footer>
    <?php include '../portFooter.php';?>
</footer>