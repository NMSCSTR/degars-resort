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
<title>Degars | Walkin</title>
<main>
    <div class="container-sm mt-5">
        <div class="row g-0 position-relative">
            <div class="container-fluid col-md-6 p-4 ps-md-0">
                <h4 class="mt-0 fw-bold"><i class="fas fa-calendar-alt"></i> W A L K I N</h4>
                <hr>
                <form action="../functions/savewalkin.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-capitalize fw-bold" name="entrancefee" id="floatingInput"
                            value="60" placeholder="entrancefee" required
                            readonly>
                        <label for="floatingInput"><i class="fas fa-dollar-sign"></i> Entrance fee</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control text-capitalize fw-bold" name="numberofheads"
                            id="floatingInput" value="1" placeholder="" required oninput="validateInput(this)">

                        <label for="floatingInput"><i class="fas fa-hashtag"></i> Number of People</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" name="aminities_id" aria-label="Floating label select example">
                            <option selected>Open this select cottages</option>
                            <option value="">Not Rent</option>
                            <?php 
                            $db = mysqli_connect('localhost', 'root', '', 'capstwo');
                            $fetch_all = "SELECT * FROM `aminities`";
                            $result = $db->query($fetch_all);
                            
                            if ($result->num_rows>0) {
                                $options =mysqli_fetch_all($result, MYSQLI_ASSOC);
                            }
                            ?>
                                <?php 
                            foreach ($options as $option) {
                            ?>
                                <option value="<?php echo $option['aminities_id']; ?>">
                                    <?php echo $option['name']; ?> | ₱<?php echo $option['rates']; ?></option>
                                <?php 
                                }
                            ?>

                        </select>
                        <label for="floatingSelect">Select Aminities</label>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="../quickstart.php" class="btn btn-outline-danger">
                            <i class="fas fa-undo text-dark"></i>
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

<?php include '../portFooter.php';?>