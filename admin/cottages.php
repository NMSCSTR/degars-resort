<?php 
session_start();
if (isset($_SESSION['users_id']) && isset($_SESSION['users_username'])) {
?>
<?php include_once 'adheader.php'; ?>
<title>Degars | Aminities</title>
<div id="main">
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Aminities</li>
            </ol>
        </nav>
    </div>

    <main style="font-size: 15px;">
        <div class="container">
            <div class="card shadow bg-body rounded">
                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
                        <button type="button" class="btn btn-warning shadow rounded me-md-2" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"><i class="fas fa-plus me-2"></i>Add Aminities</button>
                    </div>
                    <!-- Datatables -->
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-sm table-hover table-border" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th> Name</th>
                                    <th> Rates</th>
                                    <th> Description</th>
                                    <th> Image 1</th>
                                    <th> Image 2</th>
                                    <th> Image 3</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php 
                                        $db = mysqli_connect("localhost","root","","capstwo");
                                        $fetchcottages = mysqli_query($db,"SELECT * FROM `aminities` WHERE `rates` != 0");
                                        while ($row = $fetchcottages->fetch_array()) { ?>
                                    <?php 
                                        $imagePath1 = $row["image1"];
                                        $imagePath1 = str_replace('../', '', $imagePath1);
                                        $imagePath2 = $row["image2"];
                                        $imagePath2 = str_replace('../', '', $imagePath2);
                                        $imagePath3 = $row["image3"];
                                        $imagePath3 = str_replace('../', '', $imagePath3);
                                        
                                        ?>
                                    <td><?php echo $row['aminities_id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['rates']; ?></td>
                                    <td><?php echo $row['description']; ?></td>

                                    <td>
                                        <img class="img-fluid" src="<?php echo $imagePath1;?>" width="50" height="50" />
                                    </td>
                                    <td>
                                        <img class="img-fluid" src="<?php echo $imagePath2;?>" width="50" height="50" />
                                    </td>
                                    <td>
                                        <img class="img-fluid" src="<?php echo $imagePath3;?>" width="50" height="50" />
                                    </td>
                                    <td>
                                        <a href="functions/deletecottage.php?aminities_id=<?php echo $row['aminities_id']; ?>"
                                            onclick="return confirm('Are you sure you want to delete this data?')"
                                            class="btn btn-outline-danger border-0"> <i class="fas fa-trash-alt"></i>
                                            Delete</a>
                                        <a href="" class="btn btn-outline-primary border-0" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal<?php echo $row['aminities_id']; ?>"><i
                                                class="fas fa-sync-alt"></i> Update</a>
                                    </td>

                                    <!-- Edit Cottages Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $row['aminities_id']; ?>"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light text-dark">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Aminities</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="functions/editcottages.php" method="post"
                                                    enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                    <label for="">CURRENT IMAGES:</label><br>
                                                        <!-- Display current images -->
                                                        <div class="d-flex justify-content-between mb-3">

                                                            <img src="<?php echo $imagePath1; ?>" alt="Current Image 1"
                                                                width="100">
                                                            <img src="<?php echo $imagePath3; ?>" alt="Current Image 3"
                                                                width="100">
                                                            <img src="<?php echo $imagePath2; ?>" alt="Current Image 2"
                                                                width="100">
                                                        </div>

                                                        <input type="hidden" name="aminities_id"
                                                            value="<?php echo $row['aminities_id']; ?>">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" name="name"
                                                                value="<?php echo $row['name']; ?>"
                                                                id="exampleFormControlInput1"
                                                                placeholder="Cottage name">
                                                            <label for="exampleFormControlInput1" class="form-label">
                                                                Name</label>
                                                        </div>

                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" name="rates"
                                                                value="<?php echo $row['rates']; ?>"
                                                                id="exampleFormControlInput1"
                                                                placeholder="Cottage rates">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Rates</label>
                                                        </div>

                                                        <div class="form-floating mb-3">
                                                            <textarea class="form-control" name="description"
                                                                id="exampleFormControlTextarea1"
                                                                rows="4"><?php echo $row['description']; ?></textarea>
                                                            <label for="exampleFormControlTextarea1"
                                                                class="form-label">Description</label>
                                                        </div>
                                                        <!-- Allow user to upload new images -->
                                                        <div class="form-floating mb-3">
                                                            <input type="file" class="form-control" name="image1"
                                                                accept="image/*">
                                                            <label for="exampleFormControlTextarea1"
                                                                class="form-label">New Image 1</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input type="file" class="form-control" name="image2"
                                                                accept="image/*">
                                                            <label for="exampleFormControlTextarea1"
                                                                class="form-label">New Image 2</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input type="file" class="form-control" name="image3"
                                                                accept="image/*">
                                                            <label for="exampleFormControlTextarea1"
                                                                class="form-label">New Image 3</label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="submit"
                                                            class="btn btn-dark shadow-lg rounded"><i
                                                                class="fas fa-solid fa-save"></i> Submit <i class="fas fa-angle-double-right"></i></button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- <button id="printButton" class="btn btn-success mt-2 mb-2 shadow" onclick="printTable()"><i
                        class="fas fa-solid fa-print"></i> Print</button> -->
                </div>

                <!-- Add Cottages Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light text-dark">
                                <h5 class="modal-title" id="exampleModalLabel">Add Aminities</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="functions/savecottages.php" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="name"
                                            id="exampleFormControlInput1" placeholder="">
                                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="rates"
                                            id="exampleFormControlInput1" placeholder="Cottage rates">
                                        <label for="exampleFormControlInput1" class="form-label">Rates</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="description"
                                            id="exampleFormControlTextarea1" rows="4"></textarea>
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="file" class="form-control" name="image1" accept="image/*" required>
                                        <label for="exampleFormControlTextarea1" class="form-label">Image 1</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="file" class="form-control" name="image2" accept="image/*" required>
                                        <label for="exampleFormControlTextarea1" class="form-label">Image 2</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="file" class="form-control" name="image3" accept="image/*" required>
                                        <label for="exampleFormControlTextarea1" class="form-label">Images 3</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                    <button type="submit" name="submit" class="btn btn-dark shadow-lg rounded"><i
                                            class="fas fa-solid fa-save"></i> Submit <i class="fas fa-angle-double-right"></i></button>

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