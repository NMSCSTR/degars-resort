<?php 
session_start();
if (isset($_SESSION['users_id']) && isset($_SESSION['users_username'])) {
?>
<?php include '../config/db_connection.php'?>
<?php include_once 'adheader.php'; ?>

<title>Degars | Reports</title>

<main id="main">
    <div class="container pt-4 hide-on-print">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reports</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="card border-0 p-4 shadow mb-2 hide-on-print">
            <h5 class="fw-bolder">Generate Reports</h5>
            <form class="row g-3 p-2" action="" method="get">
                <div class="col-sm-5 form-group">
                    <input type="date" class="form-control form-control-sm" id="fromDate"
                        value="<?php echo ($_GET['fromDate'] == 0) ? 'From' : $_GET['fromDate'];?>" name="fromDate"
                        required>
                    <!-- <label for="fromDate">From Date:</label> -->
                </div>
                <div class="col-sm-5 form-group">
                    <input type="date" class="form-control form-control-sm" id="toDate"
                        value="<?php echo ($_GET['toDate'] == 0) ? 'To' : $_GET['toDate'];?>" name="toDate" required>
                    <!-- <label for="fromDate">To Date:</label> -->
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary btn-sm text-capitalize hide-on-print shadow"><i
                            class="fas fa-cogs"></i>
                        </i>
                        Generate
                    </button>
                </div>
            </form>
        </div>
        
        
        <div class="card border-0 p-4 mt-4 font-monospace" style="font-size: 15px;">
            <div class="table-responsive">
                <table class="table table-hover table-sm caption-top table-borderless">
                    <caption>Approved Reservations in <?php echo date('F d, Y', strtotime($_GET['fromDate'])) ?> -
                        <?php echo date('F d, Y', strtotime($_GET['toDate'])) ?></caption>
                    <thead>
                        <tr>
                            <th class="hide-on-print" scope="col">Transaction Ref</th>
                            <th scope="col">Reservation Date</th>
                            <th scope="col">Type</th>
                            <th class="hide-on-print" scope="col">Mode Of Payment</th>
                            <th class="hide-on-print" scope="col">Status</th>
                            <th hidden scope="col">Partial</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Total Amount</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php 
                        $fromDate = isset($_GET["fromDate"]) ? $_GET["fromDate"] : '';
                        $toDate = isset($_GET["toDate"]) ? $_GET["toDate"] : '';                        
                        $totalAmount = 0;
                        $partialAmount = 0;
                        $db = mysqli_connect("localhost","root","","capstwo");
                        if (isset($fromDate) && isset($toDate)) {
                            $completedReservationSql = mysqli_query($db,"
                                SELECT
                                    cr.comres_id,
                                    cr.transaction_ref,
                                    cr.modeofpayment,
                                    cr.status,
                                    cr.servicefee,
                                    cr.totalamount,
                                    cr.payment_id,
                                    cr.checkout_id,
                                    cr.checkouturl,
                                    cr.dateadded,
                                    reservation.reservation_id,
                                    reservation.type,
                                    reservation.eventname,
                                    reservation.reservationdate,
                                    reservation.paymentduedate,
                                    reservation.rates,
                                    customer.customer_id,
                                    customer.firstname,
                                    customer.lastname,
                                    customer.email_address,
                                    customer.phone_number
                                FROM
                                    completed_reservation AS cr 
                                LEFT JOIN
                                    reservation ON reservation.reservation_id = cr.reservation_id
                                LEFT JOIN
                                    customer ON customer.customer_id = cr.customer_id
                                WHERE 
                                    cr.dateadded BETWEEN '$fromDate' AND '$toDate' AND cr.status LIKE '%Approved%' OR cr.status LIKE '%Done%'"
                            );

                        if ($completedReservationSql) {
                            while ($row = mysqli_fetch_assoc($completedReservationSql)) { 
                                $totalAmount += $row['totalamount'];
                                if ($row['modeofpayment'] === '50% Downpayment' && $row['status'] != 'Done') {
                                    $partialAmount += $row['totalamount'] / 2;
                                }
                                
                                ?>
                                <tr>
                                    <td class="hide-on-print"><?php echo $row['transaction_ref']; ?></td>
                                    <td><?php echo date('F d, Y', strtotime($row['reservationdate'])); ?></td>
                                    <td><?php echo $row['type']; ?></td>
                                    <td class="hide-on-print"><?php echo $row['modeofpayment']; ?></td>
                                    <td class="hide-on-print"><?php echo $row['status']; ?></td>
                                    <td hidden><?php echo ($row['modeofpayment'] === 'Full Payment') ? 'Paid' : number_format($row['totalamount'] / 2, 2, '.', ','); ?></td>
                                    <td><?php echo ($row['modeofpayment'] === 'Full Payment' 
                                    || $row['status'] === 'Done') ? 'paid' : number_format($row['totalamount'] / 2, 2, '.', ','); ?></td>
                                    <td><?php echo number_format($row['totalamount'], 2, '.', ','); ?></td>
                                </tr>
                                <?php 
                                        }
                                    } 
                                } 
                            ?>
                    </tbody>
                </table>
                <div class="mt-3 d-flex justify-content-end mb-3">
                    <?php if (isset($completedReservationSql) && mysqli_num_rows($completedReservationSql) > 0) { ?>
                        <h6>Total Amount: <span class="text-success fw-bold"><?php echo number_format($totalAmount, 2, '.', ','); ?></span></h6>
                        <p> | </p>
                        <h6>Payable Amount: <span class="text-danger fw-bold"> <?php echo number_format($partialAmount, 2, '.', ','); ?></span></h6>
                    <?php } else { ?>
                        <p class="text-danger"><strong>No Data Available</strong></p>
                    <?php } ?>
                </div>
                <?php if (isset($completedReservationSql) && mysqli_num_rows($completedReservationSql) > 0) { ?>
                    <button id="printButton" class="btn btn-primary text-capitalize btn-sm hide-on-print"><i class="fas fa-print"></i> Print</button>
                <?php } ?>
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

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("printButton").addEventListener("click", function() {
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