<?php
session_start();
if (isset($_SESSION['users_id']) && isset($_SESSION['users_username'])) {
?>
<?php include_once 'adheader.php'; ?>
<title>Degars | Paymongo</title>
<main id="main">
    <style>
    .solid-gradient-text {
        background: linear-gradient(45deg, #00ff00, #9400D3);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }
    </style>
    <div class="container p-5">
        <div class="position-relative p-5 text-center text-muted bg-body border border-dashed rounded-5">
            <img class="img-fluid"
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/PayMongo_Logo.svg/2560px-PayMongo_Logo.svg.png"
                width="300" alt="">
            <h1 class="text-body-emphasis fw-bolder">PayMongo Philippines, Inc.</h1>
            <p class="col-lg-6 mx-auto mb-4">
            <h5 class="fw-bold">The payment gateway for <span class="solid-gradient-text">business growth</span> </h3>
                Login to view payouts and manage payments with Paymongo. Get paid in one click with Payment Links
                </p>
                <a class="btn btn-primary px-5 mb-5" href="https://dashboard.paymongo.com/payments/all" target="_blank"
                    onclick="return openLink(this.href)">Proceed to Paymongo</a>
        </div>
    </div>
</main>

<div id="scripttag">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- Include DataTables Responsive JS -->
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <!-- Initialize DataTable with responsive feature -->
    <script src="resources/js/dash.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="resources/js/sweetalert.js"></script>
    <!-- Add a JavaScript function to open the link in a new tab/window -->
    <script>
    function openLink(url) {
        window.open(url, '_blank');
        return false; // Prevent the default link behavior
    }
    </script>
</div>
<?php include_once 'adfooter.php'; ?>
<?php
} else {
    header("Location: ../login.php");
    exit();
}
?>