<?php session_start(); ?>
<?php include 'portHeader.php'; ?>
<title>Quickstart</title>
<main>
    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-sm-12 mt-5">
                <p class="h4 d-flex justify-content-center text-center text-wrap"><strong>Please take a moment on viewing our
                    resort rules before making a reservation. Thank you!</strong> </p><br>
                <a class="d-flex justify-content-center" href="" data-bs-toggle="modal" data-bs-target="#resortrules">
                    View Resort Rules</a><br>
                <a class="d-flex justify-content-center" href="" data-bs-toggle="modal"
                    data-bs-target="#reservationrules"> View Reservation Rules</a>
            </div>
        </div>
        <div class="form-floating mt-4 p-2">
            <select class="form-select" id="chooseReservation" name="chooseReservation"
                onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);"
                required>
                <option selected>Select an option</option>
                <option value="package/packagebooking.php?type=Package">Package Reservation</option>
                <option value="exclusive/exclusivebooking.php?type=Exclusive">Exclusive Reservation</option>
                <option value="exclusive/walkin.php?type=Walkin">Walk-In | Advance Payment</option>
            </select>
            <label for="chooseReservation">Choose Reservation</label>
        </div>
        <div class="text-center py-5">
            <a href="../index.php" class="btn btn-dark">Back to Homepage</a>
        </div>
        
    </div>


    <!-- Modal -->
    <div class="modal fade" id="resortrules" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Resort Rules</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?php 
                    $db = mysqli_connect('localhost', 'root', '', 'capstwo');
                    $fetch = mysqli_query($db, "SELECT * FROM `rules` WHERE `type` = 'Resort'");
                    while ($row = $fetch->fetch_array()) { ?>
                    <!-- <div class="alert alert-dark" role="alert">
                        <?php echo $row['rules'] ?>
                    </div> -->

                    <figure>
                    <blockquote class="blockquote">
                        <p><?php echo $row['rules'] ?></p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        Rules for <cite title="Source Title"><?php echo $row['type'] ?></cite>
                    </figcaption>
                    </figure>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="reservationrules" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Reservation Rules</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php 
                    $db = mysqli_connect('localhost', 'root', '', 'capstwo');
                    $fetch = mysqli_query($db, "SELECT * FROM `rules` WHERE `type` = 'Reservation'");
                    while ($row = $fetch->fetch_array()) { ?>
                    <!-- <div class="alert alert-dark" role="alert">
                        <?php echo $row['rules'] ?>
                    </div> -->
                    <figure>
                    <blockquote class="blockquote">
                        <p><?php echo $row['rules'] ?></p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        Rules for <cite title="Source Title"><?php echo $row['type'] ?></cite>
                    </figcaption>
                    </figure>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="mt-5">
    <!-- <?php include_once 'stickyFooter.php'?> -->
    <?php include 'portFooter.php';?>
</footer>