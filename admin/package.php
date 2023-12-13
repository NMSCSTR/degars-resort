<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])) {
?>
<?php include '../config/db_connection.php'?>
<?php include_once 'adheader.php'; ?>
<title>Degars | Package</title>
<main id="main">
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Package Reservation</li>
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
                            <th>Reserve Date</th>
                            <th>CheckoutURL</th>
                            <th>Rate</th>
                            <th>Partial</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ref-7239</td>
                            <td>10/29/2023</td>
                            <td><a href="https://pm.link/degarresort/nQw3Mtv">https://pm.link/degarresort/nQw3Mtv</a>
                            </td>
                            <td>1500</td>
                            <td>750</td>
                            <td>
                                <a href="" class="btn btn-warning btn-sm shadow rounded me-md-2"><i
                                        class="fas fa-edit me-2"></i>Edit</a>
                                <a href="" class="btn btn-danger btn-sm shadow rounded me-md-2" id="btn-delProd"><i
                                        class="fas fa-trash-alt me-2"></i>Delete</a>
                                <a href="" class="btn btn-outline-dark btn-sm shadow rounded me-md-2" id="btn-viewMore"
                                    title="View More Informations">View More <i class="fas fa-arrow-right"></i></a>
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