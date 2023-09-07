<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon"
        href="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Diigo.svg/256px-Diigo.svg.png"
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
</style>

<body>
    <nav class="navbar navbar-dark bg-dark shadow">
        <div class="container">
            <div class="btn btn-dark">
                <span id="openNav" style="font-size:20px;cursor:pointer;" onclick="openNav()">&#9776; Degars Resort</span>
            </div>
                
            <div class="dropdown">
                <a href="" class="btn btn-dark btn-md dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">Welcome <span
                        class="text-warning text-capitalize"><?php echo $_SESSION['admin_username'];?></span></a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" onclick="return confirm('Are you sure you want to change password?');"
                            href=""><i class="fas fa-edit me-2"></i>Change password</a></li>
                    <li><a class="dropdown-item" id="logout-btn" href="logout.php"><i
                                class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="dashboard.php"><i class="fas fa-tachometer-alt text-warning"></i> Dashboard</a>
        <a href="reservations.php"><i class="fas fa-calendar text-warning"></i> Reservations</a>
        <a href="#inventory-collapse" data-bs-toggle="collapse" class="collapsed">
            <i class="fas fa-box text-warning"></i> Inventory <span class="toggle-icon fw-bolder">&#60;</span>
        </a>
        <div class="collapse" id="inventory-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal small m-4 mt-0 mb-0">
                <li><a href="product.php" class="rounded"><i class="fas fa-cube text-warning"></i> Product</a></li>
                <li><a href="category.php" class="rounded"><i class="fas fa-list text-warning"></i> Category</a></li>
            </ul>
        </div>
        <a href="rules.php"><i class="fas fa-exclamation-circle text-warning"></i> Rules</a>
        <a href="rooms.php"><i class="fas fa-bed text-warning"></i> Rooms</a>
        <a href="cottages.php"><i class="fas fa-home text-warning"></i> Cottage</a>
        <a href="users.php"><i class="fas fa-users text-warning"></i> Users</a>
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