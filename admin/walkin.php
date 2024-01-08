<?php 
session_start();
if (isset($_SESSION['users_id']) && isset($_SESSION['users_username'])) {
?>
<?php include '../config/db_connection.php'?>
<?php include_once 'adheader.php'; ?>
<title>Degars | Walkin</title>
<main id="main">
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Walkin Reservation</li>
            </ol>
        </nav>
    </div>

        <div class="container">
        <div class="card p-4 shadow">
        <div class="table-responsive">
                <table id="dataTable" class="table table-sm table-hover table-border" style="width:100%">
                    <thead style="font-size: 15px;">
                        <tr>
                            <th hidden>Transac Id</th>
                            <th>Ref #</th>
                            <th>Status</th>
                            <th>Aminities</th>
                            <th>Rates</th>
                            <th>Entrance Fee</th>
                            <th>Total Amount</th> 
                            <?php 
                            if ($is_admin) {
                                ?>
                                    <th>ApprovedBy</th>
                                <?php
                            }
                            ?>
                            <th>Checkout Url</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 15px;">
                        <tr>
                        <?php 
                            include_once 'functions/getwalk.php';
                            while ($row = $fetch->fetch_array()) { ?>
                            <?php 
                                $checkout_id = $row['checkout_id'];
                                $hash = hash('sha256', $checkout_id);
                            ?>
                            <td hidden><?php echo $row['wtransac_id']; ?></td>
                            <td><a href="../portal/exclusive/wcheck.php?transaction_ref=<?php echo $row['transaction_ref']; ?>"><?php echo $row['transaction_ref']; ?></a></td>
                            <td><span
                                    class="badge <?php echo $row['status'] === 'Approved' ? 'bg-success' : ($row['status'] === 'Pending' ? 'bg-warning' : 'bg-danger'); ?>"><?php echo $row['status']; ?></span>
                            <td><?php echo $row['name']; ?></td> 
                            <td><?php echo number_format($row['rates'], 2); ?></td>
                            <td><?php echo $row['totalentrancefee']; ?></td> 
                            <td><?php echo number_format($row['totalentrancefee'] + $row['rates'], 2) ; ?></td>
                            <?php 
                            if ($is_admin) {
                                ?>
                                    <td><?php echo ucwords($row['approvedby'] === null ? "System" : $row['approvedby']); ?></td> 
                                <?php
                            }
                            ?>  
                            <td><?php echo $row['checkouturl']; ?></td>
                            <td>
                                <a class="btn btn-outline-success btn-sm border-0" title="Mark as done"
                                    href="functions/markasdonewalkin.php?walkin_id=<?php echo $row['walkin_id']; ?>&wcustomer_id=<?php echo $row['wcustomer_id']; ?>&approvedby=<?php echo $_SESSION['users_username'];?>"><i
                                        class="fas fa-check-circle"></i> Mark As Done
                                </a>

                                <a class="btn btn-outline-dark btn-sm border-0" title="Check Reservation"
                                    href="allpayment.php?checkout_id=<?php echo $checkout_id; ?>&hash=<?php echo $hash; ?>&wtransac_id=<?php echo $row['wtransac_id'] ?>">
                                    <i class="far fa-calendar-check"></i> Check
                                </a>
                            </td>
                        </tr>
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