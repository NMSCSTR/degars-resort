<?php 
session_start();
if (isset($_SESSION['users_id']) && isset($_SESSION['users_username'])) {
?>
<?php include_once 'adheader.php'; ?>
<title>Degars | Users</title>
<div id="main">
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Users</li>
            </ol>
        </nav>
    </div>

    <main>
        <div class="container">
            <div class="card shadow bg-body rounded">
                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
                        <button type="button" class="btn btn-warning shadow rounded me-md-2" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"><i class="fas fa-user-plus"></i></button>
                    </div>
                    <!-- Datatables -->
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-sm table-hover table-border" style="width:100%">
                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Roles</th>
                                    <th>Username</th>
                                    <!-- <th>Password</th> -->
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php 
                                    $db = mysqli_connect("localhost","root","","capstwo");
                                    $fetchcottages = mysqli_query($db,"SELECT * FROM `admin`");
                                    while ($row = $fetchcottages->fetch_array()) { ?>
                                    <td><?php echo $row['users_id']; ?></td>
                                    <td><?php echo $row['users_firstname']; ?></td>
                                    <td><?php echo $row['users_lastname']; ?></td>
                                    <td><?php echo $row['users_role']; ?></td>
                                    <td class="text-primary"><?php echo $row['users_username']; ?></td>
                                    <!-- <td><?php echo $row['users_password']; ?></td> -->
                                    <td>
                                        <a href="functions/deleteuser.php?users_id=<?php echo $row['users_id']; ?>"
                                        onclick="showSweetAlert(event, '<?php echo $row['users_id']; ?>')" class="btn btn-outline-danger border-0"> <i
                                                class="fas fa-trash-alt"></i>
                                            Delete</a>
                                        <a href="" class="btn btn-outline-primary border-0" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal<?php echo $row['users_id']; ?>"><i class="fas fa-user-edit"></i> Update</a>
                                    </td>

                                    <!-- Edit Cottages Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $row['users_id']; ?>"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light text-dark">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="functions/edituser.php" method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="users_id"
                                                            value="<?php echo $row['users_id'] ?>">
                                                        <div class="form-floating mb-3">
                                                            <input type="text"
                                                                value="<?php echo $row['users_username'] ?>"
                                                                name="users_username" class="form-control"
                                                                id="floatingPassword" placeholder="Username">
                                                            <label for="floatingPassword">Username</label>
                                                        </div>

                                                        <div class="form-floating mb-3">
                                                            <input type="password" value="" name="users_password"
                                                                class="form-control" id="floatingPassword"
                                                                placeholder="Password">
                                                            <label for="floatingPassword">Password</label>
                                                        </div>

                                                        <div class="form-floating mb-3">
                                                            <input type="text"
                                                                value="<?php echo $row['users_firstname'] ?>"
                                                                name="users_firstname" class="form-control"
                                                                id="floatingPassword" placeholder="Firstname">
                                                            <label for="floatingPassword">Firstname</label>
                                                        </div>

                                                        <div class="form-floating mb-3">
                                                            <input type="text"
                                                                value="<?php echo $row['users_lastname'] ?>"
                                                                name="users_lastname" class="form-control"
                                                                id="floatingPassword" placeholder="Lastname">
                                                            <label for="floatingPassword">Lastname</label>
                                                        </div>


                                                        <div class="form-floating mb-3">
                                                            <select class="form-select" name="users_role"
                                                                id="floatingSelect"
                                                                aria-label="Floating label select example">
                                                                <option value="Staff">Staff</option>
                                                                <option value="Admin">Admin</option>
                                                            </select>
                                                            <label for="floatingSelect">Role</label>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                                        <button type="submit" name="edituser"
                                                            class="btn btn-dark shadow-lg rounded">Submit <i class="fas fa-angle-double-right"></i></button>

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
                                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="functions/adduser.php" method="post">
                                <div class="modal-body">

                                    <div class="form-floating mb-3">
                                        <input type="text" name="users_username" class="form-control"
                                            id="floatingPassword" placeholder="Username">
                                        <label for="floatingPassword">Username</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="password" name="users_password" class="form-control"
                                            id="floatingPassword" placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="users_firstname" class="form-control"
                                            id="floatingPassword" placeholder="Firstname">
                                        <label for="floatingPassword">Firstname</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="users_lastname" class="form-control"
                                            id="floatingPassword" placeholder="Lastname">
                                        <label for="floatingPassword">Lastname</label>
                                    </div>


                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="users_role" id="floatingSelect"
                                            aria-label="Floating label select example">
                                            <option value="Staff">Staff</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                        <label for="floatingSelect">Role</label>
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                    <button type="submit" name="submit" class="btn btn-dark shadow-lg rounded">Submit <i class="fas fa-angle-double-right"></i></button>

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
    <script>
        function showSweetAlert(event, userId) {
            event.preventDefault(); 

            const href = `functions/deleteuser.php?users_id=${userId}`;

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "User has been deleted.",
                        icon: "success"
                    }).then(() => {
                        document.location.href = href;
                    });
                }
            });
        }
    </script>
</div>

<?php include_once 'adfooter.php'; ?>
<?php 
}else{
    header("Location: ../login.php");
    exit();
}
?>