<?php 
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_username'])) {
?>
<?php 
include 'adheader.php'; 
require_once 'functions/countproducts.php';
require_once 'functions/visitorscount.php'; 
require_once 'functions/countreservation.php'; 

?>
<title>Dashboard</title>
<div id="main">
    <div class="container pt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </nav>
    </div>


    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <a href="product.php" style="text-decoration: none;"">
                        <div class=" card l-bg-cherry">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-undo"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Refund</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <?php echo $countref?>
                                    </h2>
                                </div>
                                <div class="col-4 text-right">
                                    <span><?php echo $productPercentage?>% <i class="fa fa-arrow-up"></i></span>
                                </div>
                            </div>
                            <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                <div class="progress-bar l-bg-cyan" role="progressbar"
                                    data-width="<?php echo $productProgressWidth; ?>%"
                                    aria-valuenow="<?php echo $productProgressWidth; ?>%" aria-valuemin="0"
                                    aria-valuemax="100" style="width: <?php echo $productProgressWidth; ?>%;"></div>
                            </div>
                        </div>
                </div>
                </a>

            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-blue-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Visitors</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    <?php echo  $currentCount; ?>
                                </h2>
                            </div>
                            <div class="col-4 text-right">
                                <span><?php echo $percentage;?>% <i class="fa fa-arrow-up"></i></span>
                            </div>
                        </div>
                        <div class="progress mt-1 " data-height="8" style="height: 8px;">
                            <div class="progress-bar l-bg-green" role="progressbar"
                                data-width="<?php echo $progressWidth; ?>% "
                                aria-valuenow="<?php echo $progressWidth; ?>%" aria-valuemin="0" aria-valuemax="100"
                                style="width: <?php echo $progressWidth; ?>%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-green-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Reservations</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    <?php echo $allreservation; ?>
                                </h2>
                            </div>
                            <div class="col-4 text-right">
                                <span>10% <i class="fa fa-arrow-up"></i></span>
                            </div>
                        </div>
                        <div class="progress mt-1 " data-height="8" style="height: 8px;">
                            <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-orange-darka">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Total Revenue</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    <?php echo number_format($sum['total'] / 100 ,2); ?>
                                </h2>
                            </div>
                            <div class="col-4 text-right">
                                <span><?php echo $reservationProgressWidth / 100 ?>% <i class="fa fa-arrow-up"></i></span>
                            </div>
                        </div>
                        <div class="progress mt-1 " data-height="8" style="height: 8px;">
                            <div class="progress-bar l-bg-cyan" role="progressbar" data-width="<?php echo $reservationProgressWidth / 100 ?>" aria-valuenow="<?php echo $reservationProgressWidth ?>"
                                aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $reservationProgressWidth / 100 ?>;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="container">
        <div class="row">
            <div class="col-sm-6"><canvas id="myChart" style="width:100%;max-width:600px"></canvas></div>
            <div class="col-sm-6"><canvas id="myChart2" style="width:100%;max-width:600px"></canvas></div>
        </div>
        <hr>
    </div> -->
<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <h5>Recent Reservation</h5><br>
                <div class="table-responsive">
                    <table id="dataTable" class="table table-sm table-hover table-border" style="width:100%">
                        <thead>
                            <tr>
                                <th>Ref#</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th>Reservation Date</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                            include_once 'functions/getres.php';
                            while ($row = $fetchex->fetch_array()) { ?>   
                                <tr>
                                <?php 
                                $number = $row['totalamount'];;
                                $totalamount = number_format($number / 100, 2);

                                //hashing links
                                $checkout_id = $row['checkout_id'];
                                $hash = hash('sha256', $checkout_id);

                                ?>
                                <td><?php echo $row['transaction_ref']; ?></td>
                                <td><span
                                        class="badge <?php echo $row['status'] === 'Approved' ? 'bg-success' : ($row['status'] === 'Pending' ? 'bg-warning' : 'bg-danger'); ?>"><?php echo $row['status']; ?></span>
                                </td>
                                <td><?php echo $row['type']; ?></td>
                                <td><?php echo date('F d, Y', strtotime($row['reservationdate'])) ?></td>
                            </tr>
                            <?php } ?>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
                <!-- <button id="printButton" class="btn btn-success mt-2 mb-2 shadow" onclick="printTable()"><i
                        class="fas fa-print"></i> Print</button> -->
            </div>

        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- Include DataTables Responsive JS -->
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <!-- Initialize DataTable with responsive feature -->
    <script src="resources/js/dash.js"></script>
</main>

</div>
<!-- Charts -->
<div class="charts">
    <style>
    .card {
        background-color: #fff;
        border-radius: 10px;
        border: none;
        position: relative;
        margin-bottom: 30px;
        box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
    }

    .l-bg-cherry {
        background: linear-gradient(to right, #493240, #f09) !important;
        color: #fff;
    }

    .l-bg-blue-dark {
        background: linear-gradient(to right, #373b44, #4286f4) !important;
        color: #fff;
    }

    .l-bg-green-dark {
        background: linear-gradient(to right, #0a504a, #38ef7d) !important;
        color: #fff;
    }

    .l-bg-orange-dark {
        background: linear-gradient(to right, #a86008, #ffba56) !important;
        color: #fff;
    }

    .card .card-statistic-3 .card-icon-large .fas,
    .card .card-statistic-3 .card-icon-large .far,
    .card .card-statistic-3 .card-icon-large .fab,
    .card .card-statistic-3 .card-icon-large .fal {
        font-size: 110px;
    }

    .card .card-statistic-3 .card-icon {
        text-align: center;
        line-height: 50px;
        margin-left: 15px;
        color: #000;
        position: absolute;
        right: -5px;
        top: 20px;
        opacity: 0.1;
    }

    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }

    .l-bg-green {
        background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
        color: #fff;
    }

    .l-bg-orange {
        background: linear-gradient(to right, #f9900e, #ffba56) !important;
        color: #fff;
    }

    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }
    </style>

    <script>
    const xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
    const yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

    new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "rgba(0,0,255,1.0)",
                borderColor: "rgba(0,0,255,0.1)",
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        min: 6,
                        max: 16
                    }
                }],
            }
        }
    });
    </script>

    <script>
    var xxValues = ["Visitors", "Reservation", "Products", "Category", "Sales"];
    var yyValues = [<?php echo  $currentCount; ?>, 49, <?php echo $totalproducts?>, 24, 15];
    var barColors = ["red", "green", "blue", "orange", "brown"];

    new Chart("myChart2", {
        type: "bar",
        data: {
            labels: xxValues,
            datasets: [{
                backgroundColor: barColors,
                data: yyValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "DEGARS MANOR CHART"
            }
        }
    });
    </script>
</div>
<?php include 'adfooter.php'; ?>
<?php 
}else{
    header("Location: ../login.php?redirecting_error=Redirecting error. Please login first!");
    exit();
}
?>