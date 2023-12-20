<?php 
error_reporting(E_ALL);
session_start();

if (isset($_SESSION['users_id']) && isset($_SESSION['users_username'])) {
?>
<?php include '../config/db_connection.php'?>
<?php include_once 'adheader.php'; ?>
<title>Degars | Product</title>
<div id="main">
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
        </nav>
    </div>

    <main>
        <div class="container">
            <div class="card shadow bg-body rounded">
                <h5 class="card-header bg-dark text-white p-4"><i class="fas fa-edit me-2"></i> Manage Product</h5>
                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
                        <a href="category.php" class="btn btn-dark shadow rounded me-md-2"><i
                                class="fas fa-solid fa-eye me-2"></i>View Category</a>
                        <button type="button" class="btn btn-warning shadow rounded me-md-2" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"><i class="fas fa-plus me-2"></i>Add Product</button>
                    </div>
                    <hr>
                    <!-- Datatables -->
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-sm table-hover table-border" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Date Added</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $results = mysqli_query($conn,"SELECT products.productid,products.productname,products.price,products.status,products.dateadded,category.categoryid,category.categoryname 
                        FROM products 
                        LEFT JOIN category ON products.categoryid = category.categoryid ORDER BY `productid` DESC"); ?>
                                <?php while ($row = $results->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['productname'];?></td>
                                    <td><?php echo $row['price'];?></td>
                                    <td><span
                                            class='badge <?php echo ($row["status"] == 'Available' ? 'bg-success' : 'bg-danger') ?>'>
                                            <?php echo $row["status"]; ?> </span></td>
                                    <td><?php echo $row['categoryname'];?></td>
                                    <td><?php echo $row['dateadded'];?></td>
                                    <td>
                                        <a href="updateProduct.php?updateProductById=<?php echo $row['productid'];?>"
                                            class="btn btn-warning btn-sm shadow rounded me-md-2"><i
                                                class="fas fa-edit me-2"></i>Edit</a>
                                        <a href="functions/processproduct.php?deleteProductById=<?php echo $row['productid'];?>"
                                            class="btn btn-danger btn-sm shadow rounded me-md-2" id="btn-delProd"><i
                                                class="fas fa-trash-alt me-2"></i>Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Printbutton -->
                    <!-- <button id="printButton" class="btn btn-success mt-2 mb-2 shadow" onclick="printTable()"><i
                        class="fas fa-solid fa-print"></i> Print</button> -->
                </div>

                <!-- Product Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="functions/processproduct.php" method="post">
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input class="form-control form-control-xl mb-2" type="text" name="productname"
                                            id="floatingInput" placeholder="Product Name" required>
                                        <label for="floatingInput">Product Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control form-control-xl mb-2" type="text" name="price"
                                            onblur="formatAmount(this)" id="floatingInput" placeholder="Price" required>
                                        <label for="floatingInput">Price</label>
                                    </div>
                                    <div class="form-floating">
                                        <select class="form-select mb-2" id="floatingSelect" name="status" required>
                                            <option selected>Select an option</option>
                                            <option value="Available">Available</option>
                                            <option value="Not Available">Not Available</option>
                                        </select>
                                        <label for="floatingSelect">Status</label>
                                    </div>
                                    <div class="form-floating">
                                        <?php 
                                            require_once 'functions/functions.php';
                                            $categoryInstance = new Category();
                                            $categoryData = $categoryInstance->getAllCategories();
                                        ?>
                                        <?php if ($categoryData && $categoryData->num_rows > 0) { ?>
                                        <select class="form-select mb-2" id="floatingSelect" name="categoryid" required>
                                            <option selected>Select an option</option>
                                            <?php while ($row = $categoryData->fetch_assoc()) {?>
                                            <option value="<?php echo $row['categoryid'];?>">
                                                <?php echo $row['categoryname'];?></option>
                                            <?php } ?>
                                        </select>
                                        <?php } else {?>
                                        <select class="form-select mb-2" id="dropdownSelect category" name="category">
                                            <option selected><span class="text-danger">No category found</span></option>
                                        </select>
                                        <?php }?>
                                        <label for="floatingSelect">Select Category</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-danger">Clear</button>
                                    <button type="submit" class="btn btn-dark shadow-lg rounded" name="addProduct"><i
                                            class="fas fa-solid fa-save"></i> Add product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script>
                function formatAmount(input) {
                    // Parse the value and round it to two decimal places
                    const amountValue = parseFloat(input.value).toFixed(2);
                    // Convert the amount in dollars to cents
                    const amountInCents = Math.round(parseFloat(amountValue) * 100);
                    // Set the formatted amount (in dollars) back to the input field
                    input.value = amountValue;
                    // Update the hidden input field with the amount in cents
                    document.getElementById('amountInCents').value = amountInCents;
                }
                </script>
                <!-- Include jQuery -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <!-- Include DataTables JS -->
                <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                <!-- Include DataTables Responsive JS -->
                <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
                <!-- Initialize DataTable with responsive feature -->
                <script src="resources/js/dash.js"></script>
            </div>
        </div>
    </main>

</div>


<?php include_once 'adfooter.php'; ?>
<?php 
}else{
    echo "<script>alert('Please login first!');</script>";
    header("Location: ../login.php");
    exit();
}
?>