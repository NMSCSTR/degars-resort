<?php include 'portHeader.php';?>
<title>Quickstart</title>
<main>
    <div class="container"><br><br>
        <div class="form-floating mt-4 p-2">
            <select class="form-select" id="chooseReservation" name="chooseReservation" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" required>
                <option selected>Select an option</option>
                <option value="package/packagebooking.php">Package Reservation</option>
                <option value="exclusive/exclusivebooking.php">Exclusive Reservation</option>
                <option value="">Walkin</option>
            </select>
            <label for="chooseReservation">Choose Reservation</label>
        </div>
    </div>
</main>
<br><br><br><br><br><br>
<footer class="mt-5">
    <!-- <?php include_once 'stickyFooter.php'?> -->
    <?php include 'portFooter.php';?>
</footer>