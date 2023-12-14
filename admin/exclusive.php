<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])) {
?>
<?php include '../config/db_connection.php'?>
<?php include_once 'adheader.php'; ?>
<title>Degars | Exclusive</title>
<main id="main">
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Exclusive Reservation</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="card p-4 shadow">
            <div class="table-responsive">
                <table id="dataTable" class="table table-sm table-hover table-border" style="width:100%">
                    <thead>
                        <tr>
                            <th>Reference ID</th>
                            <th>Reservation ID</th>
                            <th>Customer ID</th>
                            <th>Mode of Payment</th>
                            <th>Status</th>
                            <th>Service Fee</th>
                            <th>Total Amount</th>
                            <th>Checkout URL</th>
                            <th>Date Added</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>12345</td>
                            <td>67890</td>
                            <td>Credit Card</td>
                            <td>Confirmed</td>
                            <td>$10.00</td>
                            <td>$100.00</td>
                            <td>http://example.com/checkout</td>
                            <td>2023-12-13</td>
                            <td>
                            <a class="btn btn-outline-success btn-sm border-0" title="Approved reservation"
                                    href="functions/approvedqr.php?payviaqr_id=<?php echo $row['payviaqr_id']; ?>"><i class="fas fa-check-circle"></i>
                                </a>
                                <a class="btn btn-outline-danger btn-sm border-0" title="Decline reservation"
                                    href="functions/declineqr.php?payviaqr_id=<?php echo $row['payviaqr_id']; ?>&transaction_ref=<?php echo $row['transaction_ref']; ?>">
                                    <i class="fas fa-times-circle"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
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