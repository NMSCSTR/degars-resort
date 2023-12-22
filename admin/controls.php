<?php 
session_start();
if (isset($_SESSION['users_id']) && isset($_SESSION['users_username'])) {
?>
<?php include_once 'adheader.php'; ?>
<?php 
$db = mysqli_connect('localhost', 'root', '', 'capstwo');
$fetchcp = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `control` WHERE `control_id` = 1"));
?>
<title>Degars | Control Panel</title>
<div style="overflow-y: auto;">
    <div id="main">
        <div class="container pt-4">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Control Panel</li>
                </ol>
            </nav>
        </div>
        <main style="font-size: 15px;">
            <div class="container">
                <div class="card shadow bg-body rounded">
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <h6>RESERVATION CONTROL PANEL</h6>
                            <hr>
                        </div>
                        <form action="functions/editcontrols.php" method="post">
                            <div class="container-fluid mb-3">
                                <div class="row g-3 mb-3">
                                    <div class="col-sm-7">
                                        <label for="">Package 1 Image Address</label>
                                        <input type="text" name="package1_imagelink" class="form-control form-cotrol-sm"
                                            value="<?php echo $fetchcp['package1_imagelink'] ?>"
                                            placeholder="Package 1 Image Link" aria-label="City">
                                    </div>
                                    <div class="col-sm">
                                        <label for="">Package 1 Rate</label>
                                        <input type="text" class="form-control form-cotrol-sm" name="package1_rate"
                                            id="package1RateInput" value="<?php echo $fetchcp['package1_rate'] ?>"
                                            placeholder="P1 Rate" aria-label="P1Rate">
                                    </div>
                                    <div class="col-sm">
                                        <label for="">Package 2 Rate</label>
                                        <input type="text" class="form-control form-cotrol-sm" id="package2RateInput"
                                            name="package2_rate" value="<?php echo $fetchcp['package2_rate'] ?>"
                                            placeholder="P2 Rate" aria-label="P2Rate">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-sm-7">
                                        <label for="">Package 2 Image Address</label>
                                        <input type="text" class="form-control form-cotrol-sm" name="package2_imagelink"
                                            value="<?php echo $fetchcp['package2_imagelink'] ?>"
                                            placeholder="Package 1 Image Link" aria-label="City">
                                    </div>
                                    <div class="col-sm">
                                        <label for="">Exclusive Rate</label>
                                        <input type="text" class="form-control form-cotrol-sm" id="exclusiveRateInput"
                                            name="exclusiverate" value="<?php echo $fetchcp['exclusiverate'] ?>"
                                            placeholder="Exclusive Rate" aria-label="P1Rate">
                                    </div>
                                    <div class="col-sm">
                                        <label for="">Entrance Fee</label>
                                        <input type="text" class="form-control form-cotrol-sm" id="entranceFeeInput"
                                            name="entrancefee" value="<?php echo $fetchcp['entrancefee'] ?>"
                                            placeholder="Entrance Fee" aria-label="P2Rate">
                                    </div>
                                </div>
                                <button type="submit" onclick="return confirm('Save changes?')" name="reservationPanel"
                                    class="btn btn-secondary btn-md mt-2"><i class="far fa-save"></i> Save
                                    Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container mt-4">
                <div class="card shadow bg-body rounded">
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <h6>SOCIAL MEDIA ACCOUNT CONTROL PANEL</h6>
                            <hr>
                        </div>
                        <form action="functions/editcontrols.php" method="post">
                            <div class="container-fluid mb-3">
                                <div class="row g-2 mb-3">
                                    <div class="col-sm">
                                        <label for="">Facebook</label>
                                        <input type="text" class="form-control form-cotrol-sm" name="facebook"
                                            value="<?php echo $fetchcp['facebook'] ?>" placeholder="P1 Rate"
                                            aria-label="P1Rate">
                                    </div>
                                    <div class="col-sm">
                                        <label for="">Instagram</label>
                                        <input type="text" class="form-control form-cotrol-sm" name="instagram"
                                            value="<?php echo $fetchcp['instagram'] ?>" placeholder="P2 Rate"
                                            aria-label="P2Rate">
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-sm">
                                        <label for="">Phone Number</label>
                                        <input type="text" class="form-control form-cotrol-sm" name="phone"
                                            value="<?php echo $fetchcp['phone'] ?>" placeholder="Exclusive Rate"
                                            aria-label="P1Rate">
                                    </div>
                                    <div class="col-sm">
                                        <label for="">Gmail</label>
                                        <input type="text" class="form-control form-cotrol-sm" name="email"
                                            value="<?php echo $fetchcp['email'] ?>" placeholder="Entrance Fee"
                                            aria-label="P2Rate">
                                    </div>
                                </div>
                                <button type="submit" onclick="return confirm('Save changes?')" name="socialMediaPanel"
                                    class="btn btn-secondary btn-md mt-2"><i class="far fa-save"></i> Save
                                    Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container mt-4">
                <div class="card shadow bg-body rounded">
                    <div class="card-body card-sm">
                        <div class="d-grid gap-2">
                            <h6>OTHERS</h6>
                            <hr>
                        </div>
                        <form action="functions/editcontrols.php" method="post">
                            <div class="container-fluid mb-3">
                                <div class="row g-2 mb-3">
                                    <div class="col-sm">
                                        <label for="">Event Image Address</label>
                                        <input type="text" name="eventimage" class="form-control form-cotrol-sm"
                                            value="<?php echo $fetchcp['eventimage'] ?>" placeholder=""
                                            aria-label="P1Rate">
                                    </div>
                                    <div class="col-sm">
                                        <label for="">Announcement Image Address</label>
                                        <input type="text" name="announcementimage" class="form-control form-cotrol-sm"
                                            value="<?php echo $fetchcp['announcementimage'] ?>" placeholder=""
                                            aria-label="P2Rate">
                                    </div>
                                </div>
                                <button type="submit" name="otherPanel" onclick="return confirm('Save changes?')"
                                class="btn btn-secondary btn-md mt-2"><i class="far fa-save"></i> Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
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

    <!-- <script>
        // Function to format numeric values with commas and two decimal places
        function formatNumber(inputId, numericValue) {
            var formattedValue = numericValue.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            document.getElementById(inputId).value = formattedValue;
        }

        // Assuming $fetchcp['exclusiverate'] and $fetchcp['entrancefee'] are numeric values
        var exclusiveRateValue = <?php echo $fetchcp['exclusiverate'] ?>;
        var entranceFeeValue = <?php echo $fetchcp['entrancefee'] ?>;
        var package1RateValue = <?php echo $fetchcp['package1_rate'] ?>;
        var package2RateValue = <?php echo $fetchcp['package2_rate'] ?>;

        // Apply formatting to the Exclusive Rate input
        formatNumber('exclusiveRateInput', exclusiveRateValue);

        // Apply formatting to the Entrance Fee input
        formatNumber('entranceFeeInput', entranceFeeValue);

        // Apply formatting to the Exclusive Rate input
        formatNumber('package1RateInput', package1RateValue);

        // Apply formatting to the Entrance Fee input
        formatNumber('package2RateInput', package2RateValue);
    </script> -->
</div>
<?php include_once 'adfooter.php'; ?>
<?php 
}else{
    header("Location: ../login.php");
    exit();
}
?>