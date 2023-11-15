<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])) {
?>
<?php include '../config/db_connection.php'?>
<?php include_once 'adheader.php'; ?>
<title>Degars | All payment transaction</title>
<main id="main">

    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Payment Transaction</li>
            </ol>
        </nav>
    </div>

    <div class="container" id="main">
        <div class="card shadow bg-body rounded">
            <h5 class="card-header bg-dark text-white p-4"><i class="fas fa-edit me-2"></i> View All Payment Transaction
            </h5>
            <div class="card-body">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
                    <a href="product.php" class="btn btn-dark shadow rounded me-md-2"><i
                            class="fas fa-solid fa-eye me-2"></i>View Product</a>
                    <button type="button" class="btn btn-warning shadow rounded me-md-2" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"><i class="fas fa-plus me-2"></i>Add Category</button>
                </div>
                <hr>
                <!-- Datatables -->
                <div class="table-responsive">
                    <table id="dataTable" class="table table-sm table-hover table-border" style="width:100%">
                    
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
                                <td>{$payment['id']}</td>
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