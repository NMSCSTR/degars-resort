<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])) {
?>

<?php include_once 'adheader.php'; ?>
<title>Degars | Qr Payments</title>
<main id="main">
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">QR Payments</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="card p-4 shadow">
            <div class="table-responsive">
                <table id="dataTable" class="table table-sm table-hover table-border" style="width:100%">
                    <thead>
                        <tr>
                            <th>Ref#</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Reserve Date</th>
                            <th>Rates</th>
                            <th>Mode of payment</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                            $db = mysqli_connect("localhost","root","","capstwo");
                            $fetchqrpay = mysqli_query($db, "
                                SELECT
                                    payviaqr.payviaqr_id,
                                    reservation.type,
                                    payviaqr.transaction_ref,
                                    payviaqr.status,
                                    payviaqr.gcash_name,
                                    payviaqr.gcash_number,
                                    payviaqr.receipt_img,
                                    payviaqr.mode_of_payment,
                                    reservation.type,
                                    reservation.eventname,
                                    reservation.reservation_id,
                                    reservation.reservationdate,
                                    reservation.paymentduedate,
                                    reservation.rates,
                                    customer.customer_id,
                                    customer.firstname,
                                    customer.lastname,
                                    customer.email_address,
                                    customer.phone_number
                                FROM
                                    payviaqr
                                LEFT JOIN
                                    reservation ON reservation.reservation_id = payviaqr.reservation_id
                                LEFT JOIN
                                    customer ON customer.customer_id = payviaqr.customer_id
                                ORDER BY
                                    dateqradded DESC
                            ");

                            while ($row = $fetchqrpay->fetch_array()) { ?>
                            <td><?php echo $row['transaction_ref']; ?></td>
                            <td><span
                                    class="badge <?php echo $row['status'] === 'Approved' ? 'bg-success' : ($row['status'] === 'Pending' ? 'bg-warning' : 'bg-danger'); ?>"><?php echo $row['status']; ?></span>
                            </td>
                            <td><?php echo $row['type']; ?></td>
                            <td><?php echo $row['reservationdate']; ?></td>
                            <td><?php echo $row['rates']; ?></td>
                            <td><?php echo $row['mode_of_payment']; ?></td>
                            <td>
                                <a class="btn btn-outline-success btn-sm border-0" title="Approved reservation"
                                    href="functions/approvedqr.php?payviaqr_id=<?php echo $row['payviaqr_id']; ?>"><i class="fas fa-check-circle"></i> Approved
                                </a>
                                <a class="btn btn-outline-danger btn-sm border-0" title="Decline reservation"
                                    href="functions/declineqr.php?payviaqr_id=<?php echo $row['payviaqr_id']; ?>&transaction_ref=<?php echo $row['transaction_ref']; ?>">
                                    <i class="fas fa-times-circle"></i> Decline
                                </a>

                                <a class="btn btn-outline-dark btn-sm border-0" title="See more details" href=""
                                    data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop<?php echo $row['transaction_ref']; ?>"><i
                                        class="fas fa-ellipsis-h"></i> See more details
                                </a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop<?php echo $row['transaction_ref']; ?>"
                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-g">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">More Details</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="modal-title text-uppercase mb-3" id="exampleModalLabel">
                                            <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></h5>
                                        <p class="mb-0" style="color: #35558a;">Reservation Details</p>
                                        <hr class="mt-2 mb-4"
                                            style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;">

                                        <div class="d-flex justify-content-between mb-1">
                                            <p class="fw-bold mb-0">Email Address</p>
                                            <p class="text-muted mb-0"><?php echo $row['email_address']; ?></p>
                                        </div>

                                        <div class="d-flex justify-content-between mb-1">
                                            <p class="fw-bold mb-0">Phone Number</p>
                                            <p class="text-muted mb-0"><?php echo $row['phone_number']; ?></p>
                                        </div>

                                        <div class="d-flex justify-content-between mb-1">
                                            <p class="fw-bold mb-0">Gcash Name</p>
                                            <p class="text-muted mb-0"><?php echo $row['gcash_name']; ?></p>
                                        </div>

                                        <div class="d-flex justify-content-between mb-1">
                                            <p class="fw-bold mb-0">Gcash Number</p>
                                            <p class="text-muted mb-0"><?php echo $row['gcash_number']; ?></p>
                                        </div>

                                        <div class="d-flex justify-content-between mb-2">
                                            <p class="fw-bold mb-0">Mode Of Payment</p>
                                            <p class="text-muted mb-0"><?php echo $row['mode_of_payment']; ?></p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold mb-0">Receipt </p>
                                            <p class="text-muted mb-0"></p>
                                        </div>
                                        <hr>
                                        <?php 
                                        $imagePath = $row["receipt_img"];
                                        $imagePath = str_replace('../', '../portal/', $imagePath);
                                        
                                        ?>
                                        <div class="d-flex justify-content-between">
                                            <img class="img-fluid" src="<?php echo $imagePath ?>" width="500"
                                                height="300" />
                                        </div>
                                    </div>
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </tbody>
                </table>
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
</main>

<?php include_once 'adfooter.php'; ?>
<?php 
}else{
    header("Location: ../login.php");
    exit();
}
?>