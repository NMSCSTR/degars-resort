<?php 
session_start();
if (isset($_SESSION['users_id']) && isset($_SESSION['users_username'])) {
?>
<?php include_once 'adheader.php'; ?>
<title>Degars | Rules</title>
<div id="main">
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Resort Rules</li>
            </ol>
        </nav>
    </div>
    <main>
        <div class="container">
            <div class="card shadow bg-body rounded">
                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
                        <button type="button" class="btn btn-warning shadow rounded me-md-2" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"><i class="fas fa-plus me-2"></i>Add Rules</button>
                    </div>
                    <!-- Datatables -->
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-sm table-hover table-border" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Rules</th>
                                    <th class="text-center">Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php 
                                $db = mysqli_connect("localhost","root","","capstwo");
                                $fetchrules = mysqli_query($db,"SELECT * FROM `rules`");
                                while ($row = $fetchrules->fetch_array()) { ?>
                                    <td><?php echo $row['type']; ?></td>
                                    <td class="text-wrap"><?php echo $row['rules']; ?></td>
                                    <td>
                                        <a href="functions/deleterule.php?rule_id=<?php echo $row['rule_id']; ?>"
                                            onclick="return confirm('Are you sure you want to delete this data?')"
                                            class="btn btn-outline-danger border-0"> <i class="fas fa-trash-alt"></i>
                                            Delete</a>
                                        <a href="" class="btn btn-outline-primary border-0" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal<?php echo $row['rule_id']; ?>"><i
                                                class="fas fa-sync-alt"></i> Update</a>
                                    </td>
                                    <!-- Edit Cottages Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $row['rule_id']; ?>"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light text-dark">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Rule</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="functions/editrule.php" method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="rule_id"
                                                            value="<?php echo $row['rule_id'] ?>">

                                                        <div class="form-floating mb-3">
                                                            <select class="form-select" name="type" id="floatingSelect"
                                                                aria-label="Floating label select example">
                                                                <option value="Reservation">Reservation Rules</option>
                                                                <option value="Resort">Resort Rules</option>
                                                            </select>
                                                            <label for="floatingSelect">Rules for</label>
                                                        </div>

                                                        <div class="form-floating mb-3">
                                                            <input type="text" name="rules"
                                                                value="<?php echo $row['rules'] ?>" name="rule"
                                                                class="form-control" id="floatingPassword"
                                                                placeholder="Rules">
                                                            <label for="floatingPassword">Rules</label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                                        <button type="submit" name="editrule"
                                                            class="btn btn-dark shadow-lg rounded"><i
                                                                class="fas fa-sync-alt"></i> Update Rule</button>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </tbody>
                            <?php } ?>
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
                                <h5 class="modal-title" id="exampleModalLabel">Add rules</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="functions/addrules.php"" method="post">
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="type" id="floatingSelect"
                                            aria-label="Floating label select example">
                                            <option value="Reservation">Reservation Rules</option>
                                            <option value="Resort">Resort Rules</option>
                                        </select>
                                        <label for="floatingSelect">Rules for</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="rules" class="form-control" id="floatingPassword"
                                            placeholder="Rules">
                                        <label for="floatingPassword">Rules</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="addrules" class="btn btn-warning shadow-lg rounded"><i
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
</div>
<?php include_once 'adfooter.php'; ?>
<?php 
}else{
    header("Location: ../login.php");
    exit();
}
?>