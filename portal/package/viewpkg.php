
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Packages</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <!-- <div class="container">
        <h2>Available Packages</h2>
        <div class="row">
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
                    <div class="card" style="width: 18rem;">
                        <img src="<?= $imagePath ?>" class="card-img-top" alt="Package Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['package_name']; ?></h5>
                            <p class="card-text">Rate: $<?php echo $row['package_rate']; ?></p>
                            <a href="#" class="btn btn-primary">Book Now</a>
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
    </div> -->

    <div class="container">
    <h2>Available Packages</h2>
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
            <div class="col-md-6">
                <div class="card-header bg-dark text-white py-3">
                    <h4 class="my-0 fw-normal"><?php echo $row['package_name']; ?></h4>
                </div>
                <div class="card-body">
                    <img src="<?= $imagePath ?>" alt="" class="img-fluid mb-2" style="height: 500px;">
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
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
