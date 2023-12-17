<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])) {
?>
<?php include 
'../config/db_connection.php'; 
$received_checkout_id = $_GET['checkout_id'];
$received_hash = $_GET['hash'];
$computed_hash = hash('sha256', $received_checkout_id);
if ($computed_hash === $received_hash) {
    $checkout_id = $received_checkout_id;
} else {
    echo 'Invalid data!';
}

?>
<?php include_once 'adheader.php'; ?>
<title>Degars | Checkout Transaction</title>
<main id="main">

    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout Transaction</li>
            </ol>
        </nav>
    </div>

    <div class="container" id="main">
        <div class="card shadow bg-body rounded">
            <div class="card-body">

                <!-- Datatables -->
                <div class="table-responsive">
                    <table id="dataTable" class="table table-sm table-hover table-border" style="width:100%">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
                            <a href="exclusive.php" class="btn btn-outline-secondary mb-4 d=flex justify-content-end"><i
                                    class="fas fa-undo"></i> Back to reservation</a>
                        </div>

                        <thead>
                            <tr>
                                <th>Checkout ID</th>
                                <th>Payment Method</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Source ID</th>
                                <th>Payment ID</th>
                                <th>Paid At</th>
                                <th>Updated At</th>
                                <th>Date Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $curl = curl_init();

                        curl_setopt_array($curl, [
                            CURLOPT_URL => "https://api.paymongo.com/v1/checkout_sessions/{$checkout_id}",
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

                            if (isset($data['data']['id'])) {
                                $db = mysqli_connect("localhost","root","","capstwo");
                                $c = $_GET['comres_id'];
                                $checkoutSession = $data['data'];
                                $payment = $checkoutSession['attributes']['payments'][0]['attributes'];
                                $payment_id = $checkoutSession['attributes']['payments'][0];
                                $pay_id = $payment_id['id'];
                                $formattedAmount = number_format($payment['amount'] / 100, 2);
                                if ($payment['status'] === "paid") {
                                    $insertpaymentid = mysqli_query($db,"UPDATE `completed_reservation` SET `payment_id` = '$pay_id' WHERE `comres_id` = '$c'");
                                }
                                echo "<tr>
                                        <td>{$checkoutSession['id']}</td>               
                                        <td>{$payment['source']['type']}</td>
                                        <td>{$formattedAmount}</td>
                                        <td>{$payment['status']}</td>
                                        <td>{$payment['billing']['email']}</td>
                                        <td>{$payment['billing']['name']}</td>
                                        <td>{$payment['billing']['phone']}</td>
                                        <td>{$payment['source']['id']}</td>
                                        <td>{$payment_id['id']}</td>
                                        <td>" . date('Y-m-d H:i:s', $payment['paid_at']) . "</td>
                                        <td>" . date('Y-m-d H:i:s', $payment['updated_at']) . "</td>
                                        <td>" . date('Y-m-d H:i:s', $payment['created_at']) . "</td>
                                    </tr>";
                            } else {
                                echo "<tr><td colspan='12'>No ID provided in the API response.</td></tr>";
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>


            </div>

            <!-- Category Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="functions/processproduct.php" method="post">
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control shadow" id="floatingInput" id="categoryname"
                                        name="categoryname" placeholder="Category Name">
                                    <label for="floatingInput">Category Name</label>
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="categoryname" class="form-label">Category Name</label>
                                    <input type="text" class="form-control form-control-xl shadow" id="categoryname"
                                        name="categoryname">
                                </div> -->
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" name="addCategory" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal<?php echo $row['categoryid'];?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="functions/processproduct.php" method="post">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="categoryname" class="form-label">Category Name</label>
                                    <input type="text" class="form-control form-control-xl" id="categoryname"
                                        name="categoryname">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="updatecategory" class="btn btn-primary">update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="scripttag">
                <!-- Include jQuery -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <!-- Include DataTables JS -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js">
                </script>
                <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                <!-- Include DataTables Responsive JS -->
                <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
                <!-- Initialize DataTable with responsive feature -->
                <script src="resources/js/dash.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
                <script src="resources/js/sweetalert.js"></script>
            </div>
        </div>
    </div>
</main>
<script src="resources/js/delConCat.js"></script>
<?php include_once 'adfooter.php'; ?>
<?php 
}else{
    header("Location: ../login.php");
    exit();
}
?>