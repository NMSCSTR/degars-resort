<?php 
$is_admin = ($_SESSION['users_role'] == "Admin");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon"
        href="https://img.icons8.com/external-others-inmotus-design/67/external-D-qwerty-keypad-others-inmotus-design.png"
        type="image/x-icon">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
<style>
* {
    padding: 0;
    margin: 0;
}

body {
    font-family: 'Poppins', sans-serif;
    transition: background-color .5s;
    /* background-image: url('../portal/exclusive/imgs/.jpg'); */
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

#openNav {
    transition: margin-left .5s;
}

.toggle-icon {
    transform: rotate(-90deg);
    transition: transform 0.3s ease;
    display: inline-block;
}

.collapsed .toggle-icon {
    transform: rotate(-180deg);
}

@media screen and (max-height: 768px) {
    .sidenav {
        padding-top: 15px;
    }

    .sidenav a {
        font-size: 18px;
    }
}
    @media print {
        .hide-on-print {
            display: none !important;
        }
    }
</style>

<body>
    <nav class="navbar navbar-light bg-light shadow">
        <div class="container">
            <div class="btn btn-light">
                <h5 id="openNav" title="Open Sidebar" class="fw-bolder" style="font-size:20px;cursor:pointer;"
                    onclick="openNav()">&#9776; Degars
                    Resort</h5>
            </div>

            <div class="dropdown fw-bolder">
                <a class="btn btn-light btn-md dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">Welcome <span
                        class="text-primary text-capitalize"><?php echo $_SESSION['users_username'];?></span></a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                    <!-- <li><a class="dropdown-item" onclick="return confirm('Are you sure you want to change password?');"
                            href=""><i class="fas fa-edit me-2"></i>Change password</a></li> -->
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal4"><i class="far fa-question-circle"></i> Inquiries</a></li>
                    <li><a class="dropdown-item" id="logout-btn" href="logout.php"><i
                                class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">MESSAGES/INQUIRIES</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php 
                    $db = mysqli_connect("localhost","root","","capstwo");
                    $sql = "SELECT id, name, email, message FROM inquiries";
                    $result = $db->query($sql);
                    
                    if ($result->num_rows > 0) {
                        // Output data for each row
                        while ($row = $result->fetch_assoc()) {
                            $id = $row["id"];
                            $name = $row["name"];
                            $email = $row["email"];
                            $message = $row["message"];
                    
                            // Generate Bootstrap 5 collapsible elements for each message
                            echo '<p>';
                            echo '  <button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $id . '" aria-expanded="false" aria-controls="collapse' . $id . '">';
                            echo '    ' . $name . ' (' . $email . ')';
                            echo '  </button>';
                            echo '</p>';
                            echo '<div>';
                            echo '  <div class="collapse" id="collapse' . $id . '">';
                            echo '    <div class="card card-body mb-3">';
                            echo '      ' . $message;
                            echo '    </div>';
                            echo '  </div>';
                            echo '</div>';
                        }
                    } else {
                        echo "No messages found.";
                    }
                    
                    // Close the database connection
                    $db->close();
                    ?>
                    
                </div>
            </div>
        </div>
    </div>


    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn text-danger" title="Hide Sidebar" onclick="closeNav()">&times;</a>
        <a href="dashboard.php" style="font-size: 18px;"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="#inventory-collapse" data-bs-toggle="collapse" class="collapsed" style="font-size: 18px;">
            <i class="fas fa-calendar-plus"></i> Reservation <span class="toggle-icon fw-bolder">&#60;</span>
        </a>
        <div class="collapse" id="inventory-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal small m-4 mt-0 mb-0">
                <li><a href="exclusive.php" class="rounded" style="font-size: 18px;"><i class="fas fa-trophy"></i>
                        Reservations</a></li>
                <li><a href="walkin.php" class="rounded" style="font-size: 18px;"><i class="fas fa-walking"></i>
                        Walkin</a></li>
                <li><a href="qrpayments.php" class="rounded" style="font-size: 18px;"><i class="fas fa-qrcode"></i> QR
                        Payments</a></li>
                <li><a href="refund.php" class="rounded" style="font-size: 18px;"><i class="fas fa-undo"></i> Refund</a>
                </li>
            </ul>
        </div>
        <!-- <a href="#inventory-collapsed" data-bs-toggle="collapse" class="collapsed" style="font-size: 18px;">
        <i class="fas fa-archive"></i> Inventory <span class="toggle-icon fw-bolder">&#60;</span>
    </a>
    <div class="collapse" id="inventory-collapsed">
        <ul class="btn-toggle-nav list-unstyled fw-normal small m-4 mt-0 mb-0">
            <li><a href="product.php" class="rounded" style="font-size: 18px;"><i class="fas fa-cube"></i> Product</a></li>
            <li><a href="category.php" class="rounded" style="font-size: 18px;"><i class="fas fa-list"></i> Category</a></li>
        </ul>
    </div> -->
        <a href="rules.php" style="font-size: 18px;"><i class="fas fa-book"></i> Rules</a>
        <a href="package.php" style="font-size: 18px;"><i class="fas fa-box"></i> Packages</a>
        <a href="cottages.php" style="font-size: 18px;"><i class="fas fa-home"></i> Aminities</a>
        <?php 
        if ($is_admin) {
        ?>
        <a href="#inventory-collapse1" data-bs-toggle="collapse" class="collapsed" style="font-size: 18px;">
            <i class="fas fa-briefcase"></i> Paymongo <span class="toggle-icon fw-bolder">&#60;</span>
        </a>

        <div class="collapse" id="inventory-collapse1">
            <ul class="btn-toggle-nav list-unstyled fw-normal small m-4 mt-0 mb-0">
                <li><a href="paymongo.php" class="rounded" style="font-size: 18px;"><i
                            class="far fa-credit-card"></i>
                        Payments & Payouts</a></li>
            </ul>
        </div>

        <a href="controls.php" style="font-size: 18px;"><i class="fas fa-sliders-h"></i> Control Panel</a>
        <a href="users.php" style="font-size: 18px;"><i class="fas fa-users"></i> Users</a>
        <?php
    }
    ?>


    </div>


    <script>
    // Function to open the side navigation
    function openNav() {
        // Get the width of the viewport (screen)
        var viewportWidth = window.innerWidth || document.documentElement.clientWidth;

        if (viewportWidth < 768) {
            document.getElementById("mySidenav").style.width = "60%";
            document.getElementById("main").style.marginLeft = "0";
        } else {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            document.getElementById("openNav").style.marginLeft = "150px";
        }
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.getElementById("openNav").style.marginLeft = "0";
    }
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const collapseLink = document.querySelector('.collapse-link');

        collapseLink.addEventListener('click', function() {
            const toggleIcon = collapseLink.querySelector('.toggle-icon');
            toggleIcon.classList.toggle('collapsed');
        });
    });
    </script>