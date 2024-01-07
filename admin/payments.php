<?php
session_start();
if (isset($_SESSION['users_id']) && isset($_SESSION['users_username'])) {
?>
<?php include_once 'adheader.php'; ?>
<title>Degars | Paymongo</title>
<main id="main">
    <style>
    .solid-gradient-text {
        background: linear-gradient(45deg, #00ff00, #9400D3);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }
    </style>
    <div class="container-fluid p-2">
        <div class="position-relative p-5 text-center text-muted bg-body border border-dashed rounded-5 shadow">
            <img class="img-fluid"
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/PayMongo_Logo.svg/2560px-PayMongo_Logo.svg.png"
                width="300" alt="">
            <h1 class="text-body-emphasis fw-bolder">PayMongo Philippines, Inc.</h1>
            <p class="col-lg-6 mx-auto mb-4">
            <h5 class="fw-bold">The payment gateway for <span class="solid-gradient-text">business growth</span> </h3>
                Login to view payouts and manage payments with Paymongo. Get paid in one click with Payment Links
                </p>
                <a class="btn btn-success px-5 mb-5" href="https://dashboard.paymongo.com/payments/all" target="_blank"
                    onclick="return openLink(this.href)">Proceed to Paymongo</a>
                <hr>
                <section>
                    <div class="container">
                        <h2>List of payments</h2>
                        <!-- Datatables -->
                        <div class="table-responsive text-start">
                            <table id="dataTable" class="table table-sm table-hover table-lg"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Payment Method</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Email</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Source ID</th>
                                        <th>Paid At</th>
                                        <th>Updated At</th>
                                        <th>Date Created</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $curl = curl_init();

                                    curl_setopt_array($curl, [
                                    CURLOPT_URL => "https://api.paymongo.com/v1/payments?limit=50",
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => "",
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 30,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => "GET",
                                    CURLOPT_HTTPHEADER => [
                                        "accept: application/json",
                                        "authorization: Basic c2tfbGl2ZV9EOThaY0h3ajVZMzU1SDQxMWtRYUVkQlY6c2tfbGl2ZV9EOThaY0h3ajVZMzU1SDQxMWtRYUVkQlY="
                                    ],
                                    ]);

                                    $response = curl_exec($curl);
                                    $err = curl_error($curl);

                                    curl_close($curl);

                                    if ($err) {
                                    echo "cURL Error #:" . $err;
                                    } else {
                                        $data = json_decode($response, true);
                                    }

                                    foreach ($data['data'] as $payment) {
                                        $formattedAmount = number_format($payment['attributes']['amount'] / 100, 2);
                                        echo "<tr>
                                        <td class='text-primary'>{$payment['id']}</td>
                                        <td>{$payment['attributes']['source']['type']}</td>
                                        <td>{$formattedAmount}</td>
                                        <td>{$payment['attributes']['status']}</td>
                                        <td>{$payment['attributes']['billing']['email']}</td>
                                        <td>{$payment['attributes']['billing']['name']}</td>
                                        <td>{$payment['attributes']['billing']['phone']}</td>
                                        <td>{$payment['attributes']['source']['id']}</td>
                                        <td>" . date('Y-m-d H:i:s', $payment['attributes']['paid_at']) . "</td>
                                        <td>" . date('Y-m-d H:i:s', $payment['attributes']['updated_at']) . "</td>
                                        <td>" . date('Y-m-d H:i:s', $payment['attributes']['created_at']) . "</td>
                                            </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
        </div>
        </section>
    </div>
    </div>

</main>


<div id="scripttag">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- Include DataTables Responsive JS -->
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <!-- Initialize DataTable with responsive feature -->
    <script src="resources/js/dash.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="resources/js/sweetalert.js"></script>
    <!-- Add a JavaScript function to open the link in a new tab/window -->
    <script>
    function openLink(url) {
        window.open(url, '_blank');
        return false; // Prevent the default link behavior
    }
    </script>
</div>
<?php include_once 'adfooter.php'; ?>
<?php
} else {
    header("Location: ../login.php");
    exit();
}
?>