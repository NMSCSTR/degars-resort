<?php 
session_start();
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
                <li class="breadcrumb-item active" aria-current="page">Reservation</li>
            </ol>
        </nav>
    </div>

    <div class="container" id="main">
        <div class="card bg-body rounded">
            <h5 class="card-header bg-dark text-white p-3"><i class="fas fa-edit me-2"></i> Manage Reservation</h5>
            <div class="card-body">
                <ul class="nav nav-tabs">
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false">Exclusive
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                1
                                <span class="visually-hidden">New reservation</span>
                            </span></a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="packageReservation.php">
                            <span class="d-inline-block bg-primary rounded-circle p-1"></span>
                                    Package Reservations
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="walkinReservation.php"><span class="d-inline-block bg-success rounded-circle p-1"></span> Walkin Reservations</a></li>
                            <li><a class="dropdown-item" href="roomReservation.php"><span class="d-inline-block bg-info rounded-circle p-1"></span> Room Reservations</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Qr Payments</a>
                    </li>
                </ul>
            </div>

            <div class="container">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-sm table-hover table-border"
                        style="width:100%; font-size: 15px;">
                        <thead>
                            <tr>
                                <th>Ref#</th>
                                <th>Status</th>
                                <th>Reservation Date</th>
                                <th>CheckoutURL</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $results = mysqli_query($conn,"SELECT * FROM exclusiveview"); ?>
                            <?php while ($row = $results->fetch_assoc()) { ?>
                            <tr>
                                <td>
                                    <span style="cursor: pointer;" title="Click to copy"
                                        onclick="confirmCopy('<?php echo $row['transaction_reference']; ?>')">
                                        <?php echo $row['transaction_reference'];?>
                                    </span>
                                </td>
                                <td>
                                    <span
                                        class='badge <?php echo ($row["status"] == 'Approved' ? 'bg-success' : 'bg-danger') ?>'>
                                        <?php echo $row["status"]; ?>
                                    </span>
                                </td>
                                <td>November 23, 2023</td>
                                <td>
                                    <a href="<?php echo $row['checkout_url']; ?>">Checkout URL</a>
                                    <img width="24" height="24"
                                        src="https://img.icons8.com/fluency-systems-regular/48/copy--v1.png"
                                        title="Copy checkout url" alt="copy"
                                        onclick="copyUrlToClipboard('<?php echo $row['checkout_url']; ?>')"
                                        style="cursor: pointer;" />
                                </td>
                                <td style="font-size: 10px;">
                                    <a id="" href="" title="Approved Reservation"
                                        onclick="return confirm('Are you sure you want to approved this reservation?');">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                            viewBox="0 0 50 50">
                                            <path
                                                d="M 11 4 C 7.101563 4 4 7.101563 4 11 L 4 39 C 4 42.898438 7.101563 46 11 46 L 39 46 C 42.898438 46 46 42.898438 46 39 L 46 15 L 44 17.3125 L 44 39 C 44 41.800781 41.800781 44 39 44 L 11 44 C 8.199219 44 6 41.800781 6 39 L 6 11 C 6 8.199219 8.199219 6 11 6 L 37.40625 6 L 39 4 Z M 43.25 7.75 L 23.90625 30.5625 L 15.78125 22.96875 L 14.40625 24.4375 L 23.3125 32.71875 L 24.09375 33.4375 L 24.75 32.65625 L 44.75 9.03125 Z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a id="" href="" title="Cancel Reservation"
                                        onclick="return confirm('Are you sure you want to cancel this reservation?');">
                                        <img width="20" height="20"
                                            src="https://img.icons8.com/ios/50/close-window--v1.png"
                                            alt="close-window--v1" />
                                    </a>
                                    <a onclick="return confirm('Are you sure you want to delete this reservation?');"
                                        title="Delete reservation" class="text-danger" id="" href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                            viewBox="0 0 50 50">
                                            <path
                                                d="M 21 0 C 19.355469 0 18 1.355469 18 3 L 18 5 L 10.1875 5 C 10.0625 4.976563 9.9375 4.976563 9.8125 5 L 8 5 C 7.96875 5 7.9375 5 7.90625 5 C 7.355469 5.027344 6.925781 5.496094 6.953125 6.046875 C 6.980469 6.597656 7.449219 7.027344 8 7 L 9.09375 7 L 12.6875 47.5 C 12.8125 48.898438 14.003906 50 15.40625 50 L 34.59375 50 C 35.996094 50 37.1875 48.898438 37.3125 47.5 L 40.90625 7 L 42 7 C 42.359375 7.003906 42.695313 6.816406 42.878906 6.503906 C 43.058594 6.191406 43.058594 5.808594 42.878906 5.496094 C 42.695313 5.183594 42.359375 4.996094 42 5 L 32 5 L 32 3 C 32 1.355469 30.644531 0 29 0 Z M 21 2 L 29 2 C 29.5625 2 30 2.4375 30 3 L 30 5 L 20 5 L 20 3 C 20 2.4375 20.4375 2 21 2 Z M 11.09375 7 L 38.90625 7 L 35.3125 47.34375 C 35.28125 47.691406 34.910156 48 34.59375 48 L 15.40625 48 C 15.089844 48 14.71875 47.691406 14.6875 47.34375 Z M 18.90625 9.96875 C 18.863281 9.976563 18.820313 9.988281 18.78125 10 C 18.316406 10.105469 17.988281 10.523438 18 11 L 18 44 C 17.996094 44.359375 18.183594 44.695313 18.496094 44.878906 C 18.808594 45.058594 19.191406 45.058594 19.503906 44.878906 C 19.816406 44.695313 20.003906 44.359375 20 44 L 20 11 C 20.011719 10.710938 19.894531 10.433594 19.6875 10.238281 C 19.476563 10.039063 19.191406 9.941406 18.90625 9.96875 Z M 24.90625 9.96875 C 24.863281 9.976563 24.820313 9.988281 24.78125 10 C 24.316406 10.105469 23.988281 10.523438 24 11 L 24 44 C 23.996094 44.359375 24.183594 44.695313 24.496094 44.878906 C 24.808594 45.058594 25.191406 45.058594 25.503906 44.878906 C 25.816406 44.695313 26.003906 44.359375 26 44 L 26 11 C 26.011719 10.710938 25.894531 10.433594 25.6875 10.238281 C 25.476563 10.039063 25.191406 9.941406 24.90625 9.96875 Z M 30.90625 9.96875 C 30.863281 9.976563 30.820313 9.988281 30.78125 10 C 30.316406 10.105469 29.988281 10.523438 30 11 L 30 44 C 29.996094 44.359375 30.183594 44.695313 30.496094 44.878906 C 30.808594 45.058594 31.191406 45.058594 31.503906 44.878906 C 31.816406 44.695313 32.003906 44.359375 32 44 L 32 11 C 32.011719 10.710938 31.894531 10.433594 31.6875 10.238281 C 31.476563 10.039063 31.191406 9.941406 30.90625 9.96875 Z">
                                            </path>
                                        </svg></a>
                                    <a data-bs-toggle="modal" data-bs-target="#modalChoice" title="View more details"
                                        class="text-danger" id="" href="#">
                                        <img width="20" height="20"
                                            src="https://img.icons8.com/ios/50/connection-status-off.png"
                                            alt="connection-status-off" />
                                    </a>

                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- <div class="modal" tabindex="-1"
                role="dialog" id="modalChoice">
                <div class="modal-dialog" role="document">
                    <div class="modal-content rounded-3 shadow">
                        <div class="modal-body p-4 text-center">
                            <h5 class="mb-0">Enable this setting?</h5>
                            <p class="mb-0">You can always change your mind in your account settings.</p>
                        </div>
                        <div class="modal-footer flex-nowrap p-0">
                            <button type="button"
                                class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end"><strong>Yes,
                                    enable</strong></button>
                            <button type="button"
                                class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0"
                                data-bs-dismiss="modal">No thanks</button>
                        </div>
                    </div>
                </div>
            </div> -->

            
            <script src="resources/js/copyURL.js"></script>
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