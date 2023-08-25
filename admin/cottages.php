<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])) {
?>
<?php include_once 'adheader.php'; ?>
<title>Degars | Cottages</title>
<div id="main">
<div class="container pt-4">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cottages</li>
        </ol>
    </nav>
</div>

<main>
    <div class="container">
        <div class="card shadow bg-body rounded">
            <h5 class="card-header bg-dark text-white p-4"><i class="fas fa-edit me-2"></i> Manage Cottages</h5>
            <div class="card-body">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
                    <button type="button" class="btn btn-warning shadow rounded me-md-2" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"><i class="fas fa-plus me-2"></i>Add Cottages</button>
                </div>
                <hr>
                <!-- Datatables -->
                <div class="table-responsive">
                    <table id="dataTable" class="table table-sm table-hover table-border" style="width:100%">
                        <thead>
                            <tr>
                                <th> Cottage Name</th>
                                <th> Description</th>
                                <th> Rates</th>
                                <th>Date Added</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cottage 1</td>
                                <td>10 heads only</td>
                                <td>1500</td>
                                <td>2023-07-22</td>
                                <td>---------</td>
                            </tr>
                            <tr>
                                <td>Tent</td>
                                <td>30 heads only</td>
                                <td>1500</td>
                                <td>2023-07-22</td>
                                <td>---------</td>
                            </tr>
                            <tr>
                                <td>Cottage 2</td>
                                <td>20 heads only</td>
                                <td>1500</td>
                                <td>2023-07-22</td>
                                <td>---------</td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
                <!-- <button id="printButton" class="btn btn-success mt-2 mb-2 shadow" onclick="printTable()"><i
                        class="fas fa-solid fa-print"></i> Print</button> -->
            </div>

            <!-- Category Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Add Cottages</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="get">
                            <div class="modal-body">
                                <input class="form-control" type="text" placeholder="Cottage name" aria-label="default input example">
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                <button type="button" class="btn btn-dark shadow-lg rounded"><i class="fas fa-solid fa-save"></i> Add cottage</button>
                            </div>                           
                        </form>
                    </div>
                </div>
            </div>
            <!-- Include jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <!-- Include DataTables JS -->
            <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
            <!-- Include DataTables Responsive JS -->
            <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
            <!-- Initialize DataTable with responsive feature -->
            <script src="resources/js/dash.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
        </div>
    </div>
</main>
</div>
<?php include_once 'adfooter.php'; ?>
<?php 
}else{
    header("Location: ../login.php");
    exit();
}
?>