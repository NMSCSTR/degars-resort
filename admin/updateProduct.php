<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])) {
?>

<?php 
include '../config/db_connection.php';

if (isset($_GET['updateProductById'])) {
    $productid = $_GET['updateProductById'];

    $results = mysqli_query($conn, "SELECT * FROM products   WHERE productid = $productid");
    while ($row = $results->fetch_assoc()) {
        $productid = $row['productid'];
        $productname = $row['productname'];
        $price = $row['price'];
    }
}
?>
<?php include_once 'adheader.php'; ?>
<title>Degars | Update Product</title>
<main id="main">
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
                <li class="breadcrumb-item active" aria-current="page">Product/Update</li>
            </ol>
        </nav>
    </div>

    <div class="container" id="main">
        <div class="card shadow bg-body rounded">
            <h5 class="card-header bg-dark text-white p-4"><i class="fas fa-edit me-2"></i> Update Product</h5>
            <div class="card-body">
                <div class="form-group">

                    <form action="functions/processproduct.php" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="productid" value="<?php echo $productid ?>" id="floatingInput">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control form-control-xl mb-2" id="productname"
                                    name="productname" value="<?php echo $productname;?>">
                                <label for="productname">Productname</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control form-control-xl mb-2" id="price" name="price"
                                    value="<?php echo $price;?>">
                                <label for="price">Price</label>
                            </div>

                            <div class="form-floating">
                                <select class="form-select mb-2" id="dropdownSelect status" name="status" required>
                                    <!-- <option selected>Select an option</option> -->
                                    <option value="Available">Available</option>
                                    <option value="Not Available">Not Available</option>
                                </select>
                                <label for="status">Status</label>
                            </div>

                            <div class="form-floating">
                                <?php 
                                    require_once 'functions/functions.php';
                                    $categoryInstance = new Category();
                                    $categoryData = $categoryInstance->getAllCategories();
                                ?>
                                <?php if ($categoryData && $categoryData->num_rows > 0) { ?>
                                <select class="form-select mb-2" id="dropdownSelect category" name="categoryid"
                                    required>
                                    <!-- <option selected>Select an option</option> -->
                                    <?php while ($row = $categoryData->fetch_assoc()) {?>
                                    <option value="<?php echo $row['categoryid'];?>"><?php echo $row['categoryname'];?>
                                    </option>
                                    <?php } ?>
                                </select>
                                <?php } else {?>
                                <select class="form-select mb-2" id="dropdownSelect category" name="categoryid">
                                    <option selected><span class="text-danger">No category found</span></option>
                                </select>
                                <?php }?>
                                <label for="#category">Category</label>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="product.php" class="btn btn-outline-dark btn-md shadow"
                                    onclick="return confirm('Discard changes?')">Discard</a>
                                <button type="submit" name="updateProduct" class="btn btn-warning btn-md shadow"
                                    id="updateBtn">
                                    Save changes
                                </button>
                            </div>
                        </div>
                    </form>
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
<!-- 
<script>
    const updateBtn = document.getElementById("updateBtn");
    const updateContainer = document.getElementById("updateContainer");

    updateContainer.style.position = "relative";
    updateBtn.style.position = "absolute";
    updateBtn.style.top = "65%";
    updateBtn.style.right = "10px";
    updateBtn.style.transform = "translateY(-70%)";
    
</script> -->
<?php include_once 'adfooter.php'; ?>
<?php 
}else{
    header("Location: ../login.php");
    exit();
}
?>