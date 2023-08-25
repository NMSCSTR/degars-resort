<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])) {
?>
<?php include_once 'adheader.php'; ?>
<title>Rules</title>
<div class="container pt-4">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Admin Controls</li>
        </ol>
    </nav>
</div>
<main>
    <div class="container">
        <div class="card shadow bg-body rounded">
            <h5 class="card-header bg-dark text-white p-4"><i class="fas fa-edit me-2"></i> Manage all admin controls
            </h5>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Category Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Add rules</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post">
                            <div class="modal-body">
                                <input class="form-control" type="text" placeholder="Add rules"
                                    aria-label="default input example">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark shadow-lg rounded"><i
                                        class="fas fa-solid fa-save"></i> Save rules</button>
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
<?php include_once 'adfooter.php'; ?>
<?php 
}else{
    header("Location: ../login.php");
    exit();
}
?>