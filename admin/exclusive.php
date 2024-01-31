<?php 
session_start();
error_reporting(0);
if (isset($_SESSION['users_id']) && isset($_SESSION['users_username'])) {
?>
<?php include '../config/db_connection.php'?>
<?php include_once 'adheader.php'; ?>

<title>Degars | Exclusive</title>

<main id="main">
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Exclusive & Package Reservation</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="card border-0 p-4 shadow">
            <div class="d-flex justify-content-start shadow p-3 mb-3">
                <!-- <button id="printButton" class="btn btn-primary text-capitalize hide-on-print shadow"><i
                        class="fas fa-print"></i> Print</button> -->
                <form action="" method="get">
                    <div class="input-group rounded">
                        <input type="date" class="form-control form-control-sm" id="fromDate" value="" name="fromDate"
                            required>
                        <input type="date" class="form-control form-control-sm" id="toDate" value="" name="toDate"
                            required>
                        <button class="btn btn-primary" type="submit">Filter</button>
                    </div>
                </form>
            </div>
            <div class="alert alert-warning" role="alert"> Filtered data:
                <?php echo ($_GET['fromDate'] === 0) ? 'To' : date('F d, Y', strtotime($_GET['fromDate']));?> -
                <?php echo ($_GET['toDate'] === 0) ? 'To' : date('F d, Y', strtotime($_GET['toDate']));?>
            </div>
            <?php
            include_once 'functions/getres.php';
            ?>

            <?php if ($fetchex->num_rows === 0) { ?>
            <div class="alert alert-warning" role="alert">
                No data available.
            </div>
            <?php } else { ?>
            <div class="table-responsive">
                <table id="dataTable" class="table table-sm table-hover table-border" style="width:100%">
                    <thead style="font-size: 15px;">
                        <tr>
                            <th>Ref#</th>
                            <th>Type</th>
                            <th>Reservation Date</th>
                            <th hidden class="hide-on-print">Due Date</th>
                            <th>Mode Of Payment</th>
                            <th>Payment</th>
                            <th>Balance</th>
                            <th>Total</th>
                            <th class="text-center">Status</th>
                            <th hidden>Service Fee</th>
                            <?php if ($is_admin) { ?>
                            <th>Approvedby</th>
                            <?php } ?>
                            <th>Checkout URL</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 15px;">
                        <?php while ($row = $fetchex->fetch_array()) { ?>
                        <?php
                    $number = $row['totalamount'];
                    $totalamount = number_format($number / 100, 2);

                    //hashing links
                    $checkout_id = $row['checkout_id'];
                    $hash = hash('sha256', $checkout_id);

                    ?>
                        <tr>
                            <td><a
                                    href="../portal/exclusive/check.php?transaction_ref=<?php echo $row['transaction_ref']; ?>"><?php echo $row['transaction_ref']; ?></a>
                            </td>
                            <td><?php echo $row['type']; ?></td>
                            <td><?php echo date('F d, Y', strtotime($row['reservationdate'])) ?></td>
                            <td hidden class="hide-on-print">
                                <?php echo date('F d, Y', strtotime($row['paymentduedate'])) ?></td>
                            <td><?php echo $row['modeofpayment']; ?></td>
                            <td><?php echo $totalamount; ?></td>
                            <td><?php echo ($row['modeofpayment'] === 'Full Payment' ? "Paid" : $totalamount); ?></td>
                            <td><?php echo number_format($row['rates'], 2); ?></td>
                            <td class="text-center"><span
                                    class="badge <?php echo ($row['status'] === 'Approved' ||  $row['status'] === 'Approved:QR' ||  $row['status'] === 'Done' ||  $row['status'] === 'Refunded') ? 'bg-success' : ($row['status'] === 'Pending' ? 'bg-warning' : 'bg-danger'); ?>"><?php echo $row['status']; ?></span>
                            </td>
                            <td hidden><?php echo number_format($row['servicefee'], 2); ?></td>
                            <?php if ($is_admin) { ?>
                            <td><?php echo ucwords($row['approvedby'] === null ? "System" : $row['approvedby']); ?></td>
                            <?php } ?>
                            <td><a style="font-size: 15px;"
                                    href="<?php echo $row['checkouturl']; ?>"><?php echo $row['checkouturl']; ?></a>
                            </td>
                            <td>
                                <a class="btn btn-outline-success btn-sm border-0" title="Mark as done"
                                    href="functions/markasdone.php?reservation_id=<?php echo $row['reservation_id']; ?>&customer_id=<?php echo $row['customer_id']; ?>&approvedby=<?php echo $_SESSION['users_username']; ?>"><i
                                        class="fas fa-check-circle"></i> Mark As Done</a>
                                <?php if ($row['checkouturl'] === "Via Qr") { ?>
                                <a hidden class="btn btn-outline-dark btn-sm border-0" title="Check Reservation"
                                    href="allpayment.php?checkout_id=<?php echo $checkout_id; ?>&hash=<?php echo $hash; ?>&comres_id=<?php echo $row['comres_id'] ?>"><i
                                        class="far fa-calendar-check"></i> Check</a>
                                <?php } else { ?>
                                <a class="btn btn-outline-dark btn-sm border-0" title="Check Reservation"
                                    href="allpayment.php?checkout_id=<?php echo $checkout_id; ?>&hash=<?php echo $hash; ?>&comres_id=<?php echo $row['comres_id'] ?>"><i
                                        class="far fa-calendar-check"></i> Check</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>

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
<!-- Add this script at the end of your HTML body -->
<script>
// Wait for the document to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    // Add a click event listener to the "Print" button
    document.getElementById("printButton").addEventListener("click", function() {
        // Call the window.print() method to trigger the browser's print functionality
        window.print();
    });
});
</script>


<?php include_once 'adfooter.php'; ?>
<?php 
}else{
    header("Location: ../login.php");
    exit();
}
?>