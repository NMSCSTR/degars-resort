<?php 
session_start();
if (isset($_SESSION['users_id']) && isset($_SESSION['users_username'])) {
?>


<?php 
include '../config/db_connection.php';

if (isset($_GET['updateByCategoryId'])) {
    $categoryid = $_GET['updateByCategoryId'];

    $results = mysqli_query($conn, "SELECT * FROM category WHERE categoryid = $categoryid");
    while ($row = $results->fetch_assoc()) {
        $categoryid = $row['categoryid'];
        $categoryname = $row['categoryname'];
    }
}
?>
<?php include_once 'adheader.php'; ?>
<title>Degars | Update Category</title>
<main id="main">
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
                <li class="breadcrumb-item active" aria-current="page">Category/Update</li>
            </ol>
        </nav>
    </div>

    <div class="container" id="main">
        <div class="card shadow bg-body rounded">
            <h5 class="card-header bg-dark text-white p-4"><i class="fas fa-edit me-2"></i> Update Product Category</h5>
            <div class="card-body">
                <div class="form-group">

                    <form action="functions/processproduct.php" method="post">
                        <div class="modal-body">
                            <div class="form-group" id="updateContainer">
                                <input type="hidden" name="categoryid" value="<?php echo $categoryid ?>" id="">
                                <div class="form-floating mb-3">
                                    <input 
                                        type="text" 
                                        class="form-control shadow" 
                                        id="floatingInput" id="categoryname"
                                        name="categoryname"
                                        placeholder="Category Name"
                                        value="<?php echo $categoryname;?>"
                                    >
                                    <label for="floatingInput">Category Name</label>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="category.php" class="btn btn-outline-danger btn-sm shadow p-2" onclick="return confirm('Discard changes?')">Discard</a>
                                    <button type="submit" name="updateCategory" class="btn btn-dark btn-sm shadow p-2" >
                                        Save changes
                                    </button>
                                </div>

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

<!-- <script>
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