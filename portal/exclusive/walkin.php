<?php
session_start();
error_reporting(E_ALL);
$db = mysqli_connect('localhost', 'root', '', 'capstwo');
$fetchcp = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `control` WHERE `control_id` = 1"));

?>
<style>
html {
    height: 100%;
}

body {
    min-height: 100%;
    display: flex;
    flex-direction: column;
}

.bd-footer {
    margin-top: auto;
}
</style>
<?php include '../portHeader.php'; ?>
<title>Degars | Walk-In</title>
<main>
    <div class="container-sm mt-5">
        <div class="row g-0 position-relative">
            <div id="image-container" class="image-container"></div>
            <div class="container-fluid col-md-8 p-4 ps-md-0">
                <h4 class="mt-0 fw-bold"><i class="fas fa-calendar-alt"></i> W A L K - I N</h4>
                <hr>
                <form action="../functions/savewalkin.php" method="post">
                    <a href="" class="d-flex justify-content-end" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">View Aminities</a>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-capitalize fw-bold" name="entrancefee"
                            id="floatingInput" value="<?php echo $fetchcp['entrancefee']; ?>" placeholder="entrancefee"
                            required readonly>
                        <label for="floatingInput"><i class="fas fa-dollar-sign"></i> Entrance fee</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control text-capitalize fw-bold" name="numberofheads"
                            id="floatingInput" value="1" placeholder="" required oninput="validateInput(this)">

                        <label for="floatingInput"><i class="fas fa-hashtag"></i> Number of People</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" name="aminities_id"
                            aria-label="Floating label select example" required>
                            <option value="8" selected>Open this select cottages</option>
                            <?php 
                            $db = mysqli_connect('localhost', 'root', '', 'capstwo');
                            $fetch_all = "SELECT * FROM `aminities`";
                            $result = $db->query($fetch_all);
                            
                            if ($result->num_rows > 0) {
                                $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            }
                            ?>
                            <?php 
                            foreach ($options as $option) {
                            ?>
                            <option value="<?php echo $option['aminities_id']; ?>">
                                <?php echo $option['name']; ?>(₱<?php echo $option['rates']; ?>)
                            </option>
                            <?php 
                            }
                            ?>

                        </select>
                        <label for="floatingSelect">Select Aminities </label>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="../quickstart.php" class="btn btn-outline-danger">
                            <i class="fas fa-undo"></i>
                            Back</a>
                        <div class="vr"></div>
                        <button type="submit" class="btn btn-dark shadow-lg rounded" id="forDisabled"
                            name="addwalkin">Next <i class="fas fa-check-circle"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Aminities</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                $db = mysqli_connect("localhost", "root", "", "capstwo");
                $fetchcottages = mysqli_query($db, "SELECT * FROM `aminities` WHERE `rates` != 0 ORDER BY aminities_id DESC" );

                if ($fetchcottages->num_rows > 0) {
                ?>
                    <div id="carouselExampleDark" class="carousel carousel-dark slide">
                        <div class="carousel-indicators">
                            <?php
                $indicatorIndex = 0;
                while ($row = $fetchcottages->fetch_array()) {
                    ?>
                            <button type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide-to="<?= $indicatorIndex ?>"
                                <?php if ($indicatorIndex == 0) echo 'class="active"'; ?>
                                aria-label="Slide <?= $indicatorIndex + 1 ?>"></button>
                            <?php
                    $indicatorIndex++;
                }
                ?>
                        </div>
                        <div class="carousel-inner">
                            <?php
                // Reset the indicator index
                $indicatorIndex = 0;
                // Rewind the result set
                $fetchcottages->data_seek(0);
                while ($row = $fetchcottages->fetch_array()) {
                    $imagePath1 = '../../admin/cottageimgs/' . $row["image1"];
                    $imagePath2 = '../../admin/cottageimgs/' . $row["image2"];
                    $imagePath3 = '../../admin/cottageimgs/' . $row["image3"];
                    ?>
                            <div class="carousel-item <?php if ($indicatorIndex == 0) echo 'active'; ?>">
                                <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                    <img src="<?= $imagePath1 ?>" class="img-fluid d-block"
                                        style="width: 400px; height: 300px;" alt="Image 1">
                                    <img src="<?= $imagePath2 ?>" class="mg-fluid d-block"
                                        style="width: 400px; height: 300px;" alt="Image 2">
                                    <img src="<?= $imagePath3 ?>" class="mg-fluid d-block"
                                        style="width: 400px; height: 300px;" alt="Image 3">
                                </div>

                                <div
                                    class="carousel-caption d-none d-md-block d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                    <h5 style="color: #000;"><?= $row['name'] ?></h5>
                                    <p class="text-dark" style="color: #333;"><?= $row['description'] ?></p>
                                </div>

                            </div>
                            <?php
                    $indicatorIndex++;
                }
                ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <?php
    } else {
        echo "No data found in the database.";
    }

    // Close the database connection
    mysqli_close($db);
    ?>
                </div>

            </div>
        </div>
    </div>


</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function validateInput(inputElement) {
    // Get the entered value
    let enteredValue = inputElement.value;

    // Check if the entered value is negative
    if (enteredValue < 1) {
        // If negative, set the value to 0 or any default positive value
        inputElement.value = 1;
    }
}
</script>
<script>
$(document).ready(function() {
    // Event listener for select change
    $('#floatingSelect').change(function() {
        var selectedAminitiesId = $(this).val();

        // Check if an option is selected
        if (selectedAminitiesId !== "") {
            // Make an AJAX request to fetch images based on the selected aminities_id
            $.ajax({
                type: 'POST',
                url: 'showimgs.php', // Replace with the actual PHP script handling the request
                data: {
                    aminities_id: selectedAminitiesId
                },
                dataType: 'json', // Assuming the server will return JSON
                success: function(response) {
                    // Update the image container with the fetched images
                    var imageContainer = $('#image-container');
                    imageContainer.html(''); // Clear existing content

                    // Display the images
                    imageContainer.append('<img src="' + response.image1 +
                        '" alt="Image 1">');
                    imageContainer.append('<img src="' + response.image2 +
                        '" alt="Image 2">');
                    imageContainer.append('<img src="' + response.image3 +
                        '" alt="Image 3">');
                },
                error: function(error) {
                    console.log('Error fetching images:', error);
                }
            });
        }
    });
});
</script>

<?php include '../portFooter.php';?>