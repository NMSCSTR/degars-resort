<?php include '../portHeader.php'; ?>

<?php 
$db = mysqli_connect('localhost', 'root', '', 'capstwo');
$fetchcp = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `control` WHERE `control_id` = 1"));

$package1ImageUrl = $fetchcp['package1_imagelink'];
$package2ImageUrl = $fetchcp['package2_imagelink'];

?>
<title>Package Booking</title>
<style>
    .pkg {
        max-width: 960px;
    }

    .pricing-header {
        max-width: 700px;
    }
</style>
<div class="container pkg">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal text-body-emphasis">Packages & Pricing</h1>
        <hr class="deep-purple accent-4 mb-4 mt-0 d-inline-block mx-auto" style="width: 380px;">
        <h4>Included for all packages</h4>
        <i class="fas fa-check-circle text-success"></i> Exclusive use of the area | + ₱300.00 Corkage fee for drinks & beverages |
                +₱50.00 per head for excess person</li>
    </div>
    <main>
        <div class="row mb-3 text-center">
        <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'capstwo');
        // SQL query to retrieve packages from the database
        $sql = "SELECT * FROM packages";
        $result = $conn->query($sql);

        // Display packages using Bootstrap cards
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imagePath = '../../admin/packages/' . $row["image_name"];
                ?>
            <div class="col-sm-6">
                <div class="card mb-4 rounded-3 shadow shadow-md">
                    <div class="card-header bg-dark text-white py-3">
                        <h4 class="my-0 fw-normal"><?php echo $row['package_name']; ?></h4>
                    </div>
                    <div class="card-body">
                    <h1 class="card-title pricing-card-title"><span>&#8369</span><?php echo $row['package_rate']; ?></h1>
                    <img src="<?php echo $imagePath; ?>" class="img-fluid mb-2" style="height: 500px;" alt="Package 1 Image">
                        <a href="../exclusive/exclusivebooking.php?id=<?php echo $row['id']; ?>&type=<?php echo $row['package_name']; ?>"class="w-100 btn btn-lg btn-outline-primary"><i class="fas fa-book"></i> Book Now</a>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                echo "No packages found.";
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
    </main>
    <div class="pt-2 d-flex justify-content-center">
        <a href="../quickstart.php" class="btn btn-light btn-lg shadow"><i class="fas fa-undo"></i> Back</a>
    </div>
</div>
<?php include '../portFooter.php'; ?>
