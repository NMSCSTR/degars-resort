<?php
session_start();
error_reporting(E_ALL);
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
<title>Exclusive Reservation</title>
<main>
    <div class="container-sm mt-5">
        <div class="row g-0 position-relative">
            <div class="col-md-6 mb-md-0 p-md-4 mb-4">

                <?php include_once 'svgbg.php'?>
            </div>
            <div class="container-fluid col-md-6 p-4 ps-md-0">
                <h4 class="mt-0 fw-bold"><i class="fas fa-calendar-alt"></i> Exclusive Reservation</h4>
                <hr>
                <form action="../functions/savereservation.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="hidden" name="type" value="Exclusive">
                        <input type="text" name="eventname" class="form-control fw-bold" value="" id="floatingInput"
                            placeholder="Event name" required>
                        <label for="floatingInput"><i class="fas fa-pencil-alt"></i> Event Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <?php
                            $minDate = date("Y-m-d"); // Get the current date in "YYYY-MM-DD" format
                        ?>
                        <input type="date" name="reservationdate" id="date" min="<?php echo $minDate; ?>"
                            class="form-control fw-bold" id="floatingInput" placeholder="select date" required>
                        <label for="floatingInput"><i class="fas fa-calendar-day"></i> Select Date </label>
                    </div>
                    <!-- <div class="form-floating mb-3">
                        <select class="form-select text-capitalize fw-bold" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Open this select menu</option>
                            <option value="1">BIG POOL</option>
                            <option value="2">KIDDIE POOL</option>
                        </select>
                        <label for="floatingSelect"><i class="fas fa-swimming-pool"></i> Select Pool</label>
                    </div> -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-capitalize fw-bold" name="rates" id="floatingInput"
                            value="" placeholder="rates" onchange="formatInput(this)" required>
                        <label for="floatingInput"><i class="fas fa-money-bill"></i> Rates</label>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="http://192.168.1.4/degars-resort/portal/quickstart.php" class="btn btn-outline-danger">
                            Back</a>
                        <div class="vr"></div>
                        <button type="submit" class="btn btn-dark shadow-lg rounded" name="addReservation">Submit <i class="fas fa-check-circle"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
function formatInput(input) {
    // Get the value of the input
    let inputValue = input.value;

    // Check if the input value is a number
    if (!isNaN(inputValue)) {
        // Format the number to display two decimal places
        inputValue = parseFloat(inputValue).toFixed(2);
    }

    // Update the input value with the formatted value
    input.value = inputValue;
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var inputDate = document.getElementById('date');

    inputDate.addEventListener('input', function() {
        var selectedDate = new Date(this.value);
        var currentDate = new Date();


        currentDate.setDate(currentDate.getDate() + 1);
        var minDate = currentDate.toISOString().split('T')[0];

        if (selectedDate <= currentDate) {
            alert('Please select a future date.');
            this.value = '';
        }

        this.setAttribute('min', minDate);
    });
});
</script>

<?php include '../portFooter.php';?>