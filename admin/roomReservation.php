<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])) {
?>
<?php include '../config/db_connection.php'?>
<?php include_once 'adheader.php'; ?>
<title>Degars | Room Reservations</title>
<main id="main">
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reservation</li>
            </ol>
        </nav>
    </div>

    <div class="container" id="main">
        <div class="card shadow bg-body rounded">
            <h5 class="card-header bg-dark text-white p-4"><i class="fas fa-edit me-2"></i> Manage Reservation</h5>
            <div class="card-body">
                <ul class="nav nav-tabs">
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" href="walkinReservations.php" role="button"
                            aria-expanded="false">Room Reservations
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                1
                                <span class="visually-hidden">New reservation</span>
                            </span></a>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="packageReservation.php  ">
                            Package Reservations <span class="badge text-bg-danger">4</span>
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="reservations.php">Exclusive Reservations</a></li>
                            <li><a class="dropdown-item" href="walkinReservation.php">Walkin Reservations</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Qr Payments</a>
                    </li>
                </ul>
            </div>

            <div class="container">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-sm table-hover table-border" style="width:100%">
                        <thead>
                            <tr>
                                <th>Ref#</th>
                                <th>Reserve Date</th>
                                <th>Rate</th>
                                <th>Partial</th>
                                <th>MOP</th>
                                <th>Date Added</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ref-7239</td>
                                <td>10/29/2023</td>
                                <td>1500</td>
                                <td>750</td>
                                <td>50% Downpayment</td>
                                <td>2023-07-22</td>
                                <td>
                                    <a href="" class="btn btn-warning btn-sm shadow rounded me-md-2"><i
                                            class="fas fa-edit me-2"></i>Edit</a>
                                    <a href="" class="btn btn-danger btn-sm shadow rounded me-md-2" id="btn-delProd"><i
                                            class="fas fa-trash-alt me-2"></i>Delete</a>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
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

<?php include_once 'adfooter.php'; ?>
<?php 
}else{
    header("Location: ../login.php");
    exit();
}
?>