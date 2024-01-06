<?php 
session_start();
if (isset($_SESSION['users_id']) && isset($_SESSION['users_username'])) {
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
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
                <button type="button" class="btn btn-warning shadow rounded me-md-2" data-bs-toggle="modal"
                    data-bs-target="#addPackage"><i class="fas fa-plus me-2"></i>Add Package</button>
            </div>
            <div class="table-responsive">
                <table id="dataTable" class="table table-sm table-hover table-border" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Package Name</th>
                            <th>Rate</th>
                            <th>Image</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $results = mysqli_query($conn,"SELECT * FROM packages"); ?>
                        <?php while ($row = $results->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['package_name'];?></td>
                            <td><?php echo $row['package_rate'];?></td>
                            <td><?php echo $row['image_name'];?></td>
                            <td>
                                <a href="functions/deletepackage.php?id=<?php echo $row['id'];?>"
                                    onclick="return confirm('Are you sure you want to delete?')"
                                    class="btn btn-outline-danger border-0">Delete</a>
                                <a href="" class="btn btn-outline-primary border-0" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal<?php echo $row['id']; ?>">Update</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal<?php echo $row['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark text-white">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Package</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="functions/editpackage.php" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-floating mb-3">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <input type="text" value="<?php echo $row['package_name'];?>"
                                                    class="form-control form-control-xl" id="package_name" name="package_name">
                                                    <label for="package_name" class="form-label">Package Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" value="<?php echo $row['package_rate'];?>"
                                                    class="form-control form-control-xl" id="package_rate" name="package_rate">
                                                    <label for="package_rate" class="form-label">Package Rate</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <input class="form-control" type="file" name="image" id="formFile">
                                                    <label for="formFile" class="form-label">Images</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="updatePackage" class="btn btn-primary">update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addPackage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Package</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="functions/addpackage.php" method="post" enctype="multipart/form-data">

                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="packagename" placeholder="Package name"
                                aria-label=".form-control-sm example" required>
                            <label for="packagename">Package Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="number" name="rate" placeholder="Package rate"
                                aria-label=".form-control-sm example" required>
                            <label for="rate">Package Rate</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="file" name="image" id="formFile" required>
                            <label for="image">Package Image</label>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </div>

                    </form>
                </div>
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