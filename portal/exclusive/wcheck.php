<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon"
        href="https://img.icons8.com/external-others-inmotus-design/67/external-D-qwerty-keypad-others-inmotus-design.png"
        type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- Include DataTables Responsive CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <!-- Include DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <title>Check Reservation</title>
</head>
<style>
* {
    padding: 0;
    margin: 0;
}

body {
    font-family: 'Poppins', sans-serif;
    transition: background-color .5s;

}
</style>

<body>
    <header>
        <nav class="navbar navbar-expand-xl bg-light bg-gradient navbar-light shadow">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">
                    <img src="https://img.icons8.com/external-others-inmotus-design/67/external-D-qwerty-keypad-others-inmotus-design.png"
                        alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                    Degars Resort
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarText">
                    <span class="navbar-text">
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">
                                    <i class="fab fa-facebook"></i> Facebook
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fab fa-instagram-square"></i> Instagram
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fab fa-twitter"></i> Twitter
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="fas fa-envelope"></i> Gmail
                                </a>
                            </li>
                        </ul>
                    </span>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?php 
            $db = mysqli_connect("localhost","root","","capstwo");
            if (isset($_GET['transaction_ref'])) {
                $search = $_GET['transaction_ref'];
                $fetch = mysqli_query($db,"
                SELECT
                    wt.wtransac_id,
                    wt.transaction_ref,
                    wt.totalentrancefee,
                    wt.totalamount,
                    wt.status,
                    wt.checkout_id,
                    wt.checkouturl,
                    wt.payment_id,
                    wt.datewadded,
                    aminities.aminities_id,
                    aminities.name,
                    aminities.rates,
                    walkin.walkin_id,
                    walkin.entrancefee,
                    walkin.numberofheads,
                    walkincustomer.wcustomer_id,
                    walkincustomer.firstname,
                    walkincustomer.lastname,
                    walkincustomer.email_address,
                    walkincustomer.phone_number
                FROM
                    walkin_transac AS wt
                LEFT JOIN
                    walkin ON walkin.walkin_id = wt.walkin_id
                LEFT JOIN
                    walkincustomer ON walkincustomer.wcustomer_id = wt.wcustomer_id
                LEFT JOIN
                    aminities ON aminities.aminities_id = wt.aminities_id
                WHERE 
                    wt.transaction_ref = '$search'"
            );
            if ($fetch) {
                while ($row = mysqli_fetch_assoc($fetch)) { 
                    
            ?>
        <div class="card">
            <div class="card-body">
                <div class="container mb-5 mt-3">
                    <div class="row d-flex align-items-baseline">
                        <div class="col-xl-9">
                            <p style="color: #7e8d9f;font-size: 20px;">Transac Ref. >> <strong>
                                    <?php echo $row['transaction_ref']; ?></strong></p>
                        </div>
                        <div class="col-xl-3 float-end">
                            <?php 
                                if ($row['status'] ===  "Pending" || $row['status'] === "Refunded" ||$row['status'] === "Declined" || $row['status'] === "Done") { ?>
                            <a hidden class="btn btn-light text-capitalize border-0"
                                onclick="return confirm('8% of the total amount will be deducted for transaction refund. Are you sure you want to cancel your reservation and request refund?');"
                                data-mdb-ripple-color="dark" 
                                href="requestrefund.php?wtransac_id=<?php echo $row['wtransac_id']; ?>&walkin_id=<?php echo $row['walkin_id']; ?>&wcustomer_id=<?php echo $row['wcustomer_id']; ?>&">
                                <i class="fas fa-hand-paper"></i>
                                Request refund
                            </a>
                            <?php } else { ?>
                            <a class="btn btn-light text-capitalize border-0"
                                onclick="return confirm('8% of the total amount will be deducted for transaction refund. Are you sure you want to cancel your reservation and request refund?');"
                                data-mdb-ripple-color="dark" href="requestrefund.php?"><i class="fas fa-hand-paper"></i>
                                Request refund</a>
                            <?php } ?>
                            <a href="../../index.php" class="btn btn-light text-capitalize"
                                data-mdb-ripple-color="dark"><i class="fas fa-undo text-dark"></i> Back</a>
                        </div>
                        <hr>
                    </div>

                    <div class="container">
                        <div class="col-md-12">
                            <div class="text-center">
                                <img src="https://img.icons8.com/external-others-inmotus-design/67/external-D-qwerty-keypad-others-inmotus-design.png"
                                    alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                                <p class="pt-0">degars-resort.com</p>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-xl-8">
                                <ul class="list-unstyled">
                                    <li class="text-muted">To: <span
                                            style="color:#5d9fc5 ;"><?php echo $row['firstname']; ?>
                                            <?php echo $row['lastname']; ?></span></li>
                                    <!-- <li class="text-muted">Street, City</li> -->
                                    <li class="text-muted"><i class="fas fa-envelope"></i>
                                        <?php echo $row['email_address']; ?></li>
                                    <li class="text-muted"><i class="fas fa-phone"></i>
                                        <?php echo $row['phone_number']; ?></li>
                                </ul>
                            </div>
                            <div class="col-xl-4">
                                <p class="text-muted">Walk-In Details</p>
                                <ul class="list-unstyled">
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                            class="fw-bold">ID:</span>#<?php echo $row['wtransac_id']; ?></li>
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                            class="fw-bold">Number of people:
                                        </span><?php echo $row['numberofheads']; ?></li>
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                            class="me-1 fw-bold">Status:</span><span
                                            class="badge badge <?php echo $row['status'] === 'Approved' ? 'bg-success' : ($row['status'] === 'Pending' ? 'bg-warning' : 'bg-danger'); ?> fw-bold">
                                            <?php echo $row['status']; ?></span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row my-2 mx-1 justify-content-center">
                            <table class="table table-striped table-borderless">
                                <thead style="background-color:#84B0CA ;" class="text-white">
                                    <tr>
                                        <th scope="col">Description</th>
                                        <th scope="col">Rates</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Total Entrance Fee(<span
                                                class="text-primary"><?php echo $row['numberofheads']; ?> x
                                                ₱<?php echo $row['entrancefee']; ?></span>)</td>
                                        <td>₱<?php echo $row['totalentrancefee']; ?></td>
                                    </tr>
                                    <tr>

                                        <td>Aminities (<span class="text-primary"><?php echo $row['name']; ?></span>)
                                        </td>
                                        <td>₱<?php echo number_format($row['rates'], 2); ?></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <div class="row">
                            <div class="col-xl-8">
                                <p class="ms-3">Show the transaction reference before you enter in resort</p>

                            </div>
                            <div class="col-xl-3">
                                <ul class="list-unstyled">
                                    <!-- <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>$1110</li> -->
                                    <li class="text-muted ms-3 mt-2"><span
                                            class="text-black me-4">Servicefee(0%)</span>₱0
                                    </li>
                                </ul>
                                <p class="text-black float-start"><span class="text-black me-3"> Total
                                        Amount</span><span
                                        style="font-size: 25px;"><?php echo number_format($row['totalentrancefee'] + $row['rates'] ,2); ?></span>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-10">
                                <p>Thank you for booking @degars-resort.com</p>
                            </div>
                            <div class="col-xl-2">
                                <?php 
                                    if ($row['status'] === "Approved" || $row['status'] === "Refunded" || $row['status'] === "Declined" || $row['status'] === "Done") { ?>
                                <a hidden href="<?php echo $row['checkouturl']; ?>" id="payNowBtn"
                                    class="btn btn-primary text-capitalize">Pay Now <i class="fas fa-lock"></i></a>
                                <?php } else { ?>
                                <a href="<?php echo $row['checkouturl']; ?>" id="payNowBtn"
                                    class="btn btn-primary text-capitalize">Pay Now </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php
                                }
                            }else {
                                echo "<script>alert('You have entered incorrect transaction reference');</script>";
                            }
                        }
                        ?>
                </div>
            </div>
        </div>
        </div>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
    <script src="sweetalert.js"></script>

</body>

</html>