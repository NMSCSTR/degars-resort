<?php
session_start();
error_reporting(E_ALL);
$db = mysqli_connect('localhost', 'root', '', 'capstwo');
$getType = $_GET['type'];
if (isset($_GET['id'])) {
    $getId = $_GET['id'];
$fetchcp = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `packages` WHERE `id` = '$getId'"));
$getRates = $fetchcp['package_rate'];
} elseif ($getType == "Exclusive") {
    $fetchcp = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `control` WHERE `control_id` = 1"));
    $getRates = $fetchcp['exclusiverate'];
}


// $fetchcp = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `control` WHERE `control_id` = 1"));
// if ($getType == "Package1") {
//     $getRates = $fetchcp['package1_rate'];
// }elseif ($getType == "Package2") {
//     $getRates = $fetchcp['package2_rate'];
// }elseif ($getType == "Exclusive") {
//     $getRates = $fetchcp['exclusiverate'];
// }


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
<title><?php echo $_GET['type']; ?> Reservation</title>
<main>
    <div class="container-sm mt-5">
        <div class="row g-0 position-relative">
            <div class="col-md-6 mb-md-0 p-md-4 mb-4">
                <?php include_once 'svgbg.php'?>
            </div>
            <div class="container-fluid col-md-6 p-4 ps-md-0">
                <h4 class="mt-0 fw-bold"><i class="fas fa-calendar-alt"></i> <?php echo $_GET['type']; ?> Reservation</h4>
                <hr>
                <form action="../functions/savereservation.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" name="type" class="form-control fw-bold" value="<?= $getType ?>"
                            placeholder="Event name" required>
                        <label for="floatingInput"><i class="fas fa-file-alt"></i> Type</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="eventname" class="form-control fw-bold" value="" id="floatingInput"
                            placeholder="Event name" required>
                        <label for="floatingInput"><i class="fas fa-pencil-alt"></i> Event Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <?php
                            $minDate = date("Y-m-d");
                        ?>
                        <input type="date" name="reservationdate" id="reservationdate" min="<?php echo $minDate; ?>"
                            class="form-control fw-bold" id="floatingInput" placeholder="select date" required>
                        <label for="floatingInput"><i class="fas fa-calendar-day"></i> Select Date </label>
                        <span id="availability"></span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-capitalize fw-bold" name="rates" id="floatingInput"
                            value="<?php echo $getRates ?>" placeholder="rates" required  readonly>
                        <label for="floatingInput">₱ Rates</label>
                    </div>  
                    <div class="d-flex justify-content-end gap-2">
                        <a href="../quickstart.php" class="btn btn-outline-danger">
                        <i class="fas fa-undo"></i>
                            Back</a>
                        <div class="vr"></div>
                        <button type="submit" class="btn btn-dark shadow-lg rounded" id="forDisabled" name="addReservation">Submit <i class="fas fa-check-circle"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#reservationdate').blur(function () {
            var resDate = $(this).val();
            $.ajax({
                url: "../functions/checkavail.php",
                method: "POST",
                data: { reservationdate: resDate },
                dataType: "text",
                success: function (html) {
                    $('#availability').html(html);
                }
            });
        });
    });
</script>


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
    var inputDate = document.getElementById('reservationdate');

    inputDate.addEventListener('input', function() {
        var selectedDate = new Date(this.value);
        var currentDate = new Date();


        currentDate.setDate(currentDate.getDate() + 4);
        var minDate = currentDate.toISOString().split('T')[0];

        if (selectedDate <= currentDate) {
            alert('Please select another date.');
            this.value = '';
        }

        this.setAttribute('min', minDate);
    });
});
</script>

<?php include '../portFooter.php';?>