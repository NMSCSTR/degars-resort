<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])) {
?>
<?php include '../config/db_connection.php'?>
<?php include_once 'adheader.php'; ?>
<title>Degars | Category</title>
<main id="main">
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </nav>
    </div>

    <div class="container" id="main">
        <div class="card shadow bg-body rounded">
            <h5 class="card-header bg-dark text-white p-4"><i class="fas fa-edit me-2"></i> Manage Product Category</h5>
            <div class="card-body">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
                    <a href="product.php" class="btn btn-dark shadow rounded me-md-2"><i
                            class="fas fa-solid fa-eye me-2"></i>View Product</a>
                    <button type="button" class="btn btn-warning shadow rounded me-md-2" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"><i class="fas fa-plus me-2"></i>Add Category</button>
                </div>
                <hr>
                <!-- Datatables -->
                <div class="table-responsive">
                    <table id="dataTable" class="table table-sm table-hover table-border" style="width:100%">
                        <thead>
                            <tr>
                                <!-- <th>Id</th> -->
                                <th> Category Name</th>
                                <th>Date Added</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $results = mysqli_query($conn,"SELECT * FROM category ORDER BY `categoryid` ASC"); ?>
                            <?php while ($row = $results->fetch_assoc()) { ?>
                            <tr>
                                <!-- <td><?php echo $row['categoryid'];?></td> -->
                                <td>
                                    <?php echo $row['categoryname']; ?>
                                </td>
                                <td><?php echo $row['dateadded'];?></td>
                                <td>
                                    <a href="updateCategory.php?updateByCategoryId=<?php echo $row['categoryid'];?>" class="btn btn-warning btn-sm shadow rounded me-2">
                                        <i class="fas fa-edit me-2"></i> Edit</a>
                                    <a href="functions/processproduct.php?deleteCategoryById=<?php echo $row['categoryid'];?>" id="btndelCat" class="btn btn-danger btn-sm shadow rounded me-2" >
                                        <i class="fas fa-trash-alt me-2"></i> Delete</a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Category Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="functions/processproduct.php" method="post">
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control shadow" id="floatingInput" id="categoryname"
                                        name="categoryname"
                                        placeholder="Category Name">
                                    <label for="floatingInput">Category Name</label>
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="categoryname" class="form-label">Category Name</label>
                                    <input type="text" class="form-control form-control-xl shadow" id="categoryname"
                                        name="categoryname">
                                </div> -->
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" name="addCategory" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal<?php echo $row['categoryid'];?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="functions/processproduct.php" method="post">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="categoryname" class="form-label">Category Name</label>
                                    <input type="text" class="form-control form-control-xl" id="categoryname"
                                        name="categoryname">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="updatecategory" class="btn btn-primary">update</button>
                            </div>
                        </form>
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
    </div>
</main>

<script>
$('#btndelCat').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href')

    Swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this category?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
})
</script>
<?php include_once 'adfooter.php'; ?>
<?php 
}else{
    header("Location: ../login.php");
    exit();
}
?>