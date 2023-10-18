<header>
    <?php include '../portHeader.php';?>
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
</header>
<title>Exclusive Reservation</title>

<main>
    <div class="container-sm mt-5">
        <div class="row g-0 position-relative">
            <div class="col-md-6 mb-md-0 p-md-4 mb-4">
                <!-- <?php include_once 'carousels.php'?> -->
                <?php include_once 'svgbg.php'?>
            </div>
            <div class="container-fluid col-md-6 p-4 ps-md-0">
                <h4 class="mt-0 fw-bold"><i class="fas fa-calendar-alt"></i> Exclusive Reservation</h4>
                <hr>
                <form action="" method="post">
                    <!-- <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control text-uppercase fw-bold" id="floatingInput"
                                    placeholder="Event name">
                                <label for="floatingInput"><i class="fas fa-pencil-alt"></i> Event Name</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control text-uppercase fw-bold" id="floatingInput"
                                    placeholder="select date">
                                <label for="floatingInput"><i class="fas fa-calendar-day"></i> Select Date </label>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control fw-bold" value="Birthday Party" id="floatingInput"
                            placeholder="Event name">
                        <label for="floatingInput"><i class="fas fa-pencil-alt"></i> Event Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control fw-bold" id="floatingInput" placeholder="select date">
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
                        <input type="text" class="form-control text-capitalize fw-bold" value="PHP 5600"
                            id="floatingInput" placeholder="rates">
                        <label for="floatingInput"><i class="fas fa-money-bill"></i> Rates</label>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="http://192.168.1.4/degars-resort/portal/quickstart.php" class="btn btn-outline-danger">
                            Back</a>
                        <div class="vr"></div>
                        <a href="customerForm.php" class="btn btn-dark" name="submitExclusuveReservation">Proceed
                        
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<footer>
    <?php include '../portFooter.php';?>
</footer>
