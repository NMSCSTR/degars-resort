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

.card {
    transition: transform 0.3s;
}

.card:hover {
    transform: scale(1.05);
}
</style>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#">
                    <img src="https://img.icons8.com/external-others-inmotus-design/67/external-D-qwerty-keypad-others-inmotus-design.png"
                        alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                    Degars Resort
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                    <form method="post" action="" class="d-flex" role="search">
                        <input class="form-control me-2" name="search" type="search" placeholder="Type your transac ref"
                            aria-label="Search">
                        <button class="btn btn-outline-success" name="search" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="card">
            <div class="card-body">
            <?php 
            $db = mysqli_connect("localhost","root","","capstwo");
            if (isset($_POST['submit'])) {
                $search = $_POST['search'];
                $fetchex = mysqli_fetch_assoc(mysqli_query($db,"
                SELECT
                    cr.comres_id,
                    cr.transaction_ref,
                    cr.modeofpayment,
                    cr.status,
                    cr.servicefee,
                    cr.totalamount,
                    cr.checkout_id,
                    cr.checkouturl,
                    cr.dateadded,
                    reservation.reservation_id,
                    reservation.type,
                    reservation.eventname,
                    reservation.reservationdate,
                    reservation.paymentduedate,
                    reservation.rates,
                    customer.customer_id,
                    customer.firstname,
                    customer.lastname,
                    customer.email_address,
                    customer.phone_number
                FROM
                    completed_reservation AS cr
                LEFT JOIN
                    reservation ON reservation.reservation_id = cr.reservation_id
                LEFT JOIN
                    customer ON customer.customer_id = cr.customer_id
                WHERE 
                    cr.transaction_ref = '.$search.' "
            ));
            }

            ?>
                <div class="container mb-5 mt-3">
                    <div class="row d-flex align-items-baseline">
                        <div class="col-xl-9">
                            <p style="color: #7e8d9f;font-size: 20px;">Transac Ref. >> <strong><?php echo $fetchex['transaction_ref']; ?></strong></p>
                        </div>
                        <div class="col-xl-3 float-end">
                            <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                                    class="fas fa-print text-primary"></i> Print</a>
                            <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                                    class="far fa-file-pdf text-danger"></i> Export</a>
                        </div>
                        <hr>
                    </div>

                    <div class="container">
                        <div class="col-md-12">
                            <div class="text-center">
                                <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                                <p class="pt-0">MDBootstrap.com</p>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-xl-8">
                                <ul class="list-unstyled">
                                    <li class="text-muted">To: <span style="color:#5d9fc5 ;">John Lorem</span></li>
                                    <li class="text-muted">Street, City</li>
                                    <li class="text-muted">State, Country</li>
                                    <li class="text-muted"><i class="fas fa-phone"></i> 123-456-789</li>
                                </ul>
                            </div>
                            <div class="col-xl-4">
                                <p class="text-muted">Invoice</p>
                                <ul class="list-unstyled">
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                            class="fw-bold">ID:</span>#123-456</li>
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                            class="fw-bold">Creation Date: </span>Jun 23,2021</li>
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                            class="me-1 fw-bold">Status:</span><span
                                            class="badge bg-warning text-black fw-bold">
                                            Unpaid</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row my-2 mx-1 justify-content-center">
                            <table class="table table-striped table-borderless">
                                <thead style="background-color:#84B0CA ;" class="text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Pro Package</td>
                                        <td>4</td>
                                        <td>$200</td>
                                        <td>$800</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Web hosting</td>
                                        <td>1</td>
                                        <td>$10</td>
                                        <td>$10</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Consulting</td>
                                        <td>1 year</td>
                                        <td>$300</td>
                                        <td>$300</td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <div class="row">
                            <div class="col-xl-8">
                                <p class="ms-3">Add additional notes and payment information</p>

                            </div>
                            <div class="col-xl-3">
                                <ul class="list-unstyled">
                                    <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>$1110</li>
                                    <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Tax(15%)</span>$111
                                    </li>
                                </ul>
                                <p class="text-black float-start"><span class="text-black me-3"> Total
                                        Amount</span><span style="font-size: 25px;">$1221</span></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-10">
                                <p>Thank you for your purchase</p>
                            </div>
                            <div class="col-xl-2">
                                <button type="button" class="btn btn-primary text-capitalize"
                                    style="background-color:#60bdf3 ;">Pay Now</button>
                            </div>
                        </div>

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