<?php
$counterFile = 'visitor_count.txt';
$currentCount = (int) file_get_contents($counterFile);

$newCount = $currentCount + 1;
file_put_contents($counterFile, $newCount);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="refresh" content="">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="res/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon"
        href="https://img.icons8.com/external-others-inmotus-design/67/external-D-qwerty-keypad-others-inmotus-design.png"
        type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

html,
body,
header,
#intro {
    font-family: 'Poppins', sans-serif;
    height: 100%;
}

#intro {
    background: url("portal/exclusive/imgs/night.jpg")no-repeat center center fixed;
    /* filter: brightness(1.2) contrast(1.2) saturate(1.2); */
    color: #fff;
    /* Set the text color to white or another contrasting color */
    text-shadow: 4px 4px 4px rgba(0, 0, 0, 0.5);
    /* Add a subtle text shadow */
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.top-nav-collapse {
    background-color: #090909;
}

@media (max-width: 768px) {
    .navbar:not(.top-nav-collapse) {
        background-color: #24355C;
    }
}

@media (min-width: 800px) and (max-width: 850px) {
    .navbar:not(.top-nav-collapse) {
        background-color: #d0d7e7;
    }
}
</style>

<body class="">
    <!--Main Navigation-->
    <header>
        <!--Navbar-->
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light shadow shadow-lg">
            <div class="container-fluid">
                <!-- Navbar brand -->
                <a class="navbar-brand fw-bold" href="#">
                    <img src="https://img.icons8.com/external-others-inmotus-design/67/external-D-qwerty-keypad-others-inmotus-design.png"
                        alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                    Degars Resort
                </a>
                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Collapsible content -->
                <div class="collapse navbar-collapse justify-content-end" id="basicExampleNav">
                    <!-- Links -->
                    <ul class="navbar-nav  smooth-scroll">
                        <li class="nav-item active">
                            <a class="nav-link" href="#intro">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#best-features">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#packages">Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#gallery">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="portal/exclusive/check.php">Check Reservation</a>
                        </li>
                    </ul>
                    <!-- Links -->
                    <!-- Social Icon  -->
                    <!-- <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a class="nav-link"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul> -->
                </div>
                <!-- Collapsible content -->
            </div>
        </nav>
        <!--/.Navbar-->
        <!--Mask-->
        <div id="intro" class="view">
            <div class="mask rgba-black-strong">
                <div class="container-fluid d-flex align-items-center justify-content-center h-100">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-md-10 mt-4">
                            <!-- Heading -->
                            <br><br> <br><br> <br><br><br><br>
                            <!-- <h2 class="display-4 font-weight-bold text-light pt-5 mb-2">BOOK NOW</h2> -->
                            <!-- Description -->
                            <h3 class="text-light my-4 shadow">Dive into a world of endless summer</h3>
                            <a class="btn btn-primary" href="portal/quickstart.php">Book Now & Select type</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="mt-5" id="best-features">
        <div class="container-fluid" style="background-color: rgba(255, 255, 255, 0.5);">
            <!--Section: Best Features-->
            <section class="text-center">
                <!-- Heading -->
                <h2 class="mb-5 font-weight-bold">Best Features</h2>
                <!--Grid row-->
                <div class="row d-flex justify-content-center mb-4">
                    <!--Grid column-->
                    <div class="col-md-8">
                        <!-- Description -->
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi voluptate
                            hic
                            provident nulla repellat
                            facere esse molestiae ipsa labore porro minima quam quaerat rem, natus repudiandae debitis
                            est
                            sit pariatur.
                        </p>
                    </div>

                </div>
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-4 mb-5">
                        <i class="fa fa-camera-retro fa-4x orange-text"></i>
                        <h4 class="my-4 font-weight-bold">Experience</h4>
                        <p class="grey-text">
                            Swimming in a pool with friends and family is a fun activity that many people enjoy.
                            a mix of joy, laughter, and shared moments. The pool becomes a social gathering place.
                            where friendly banter and playful splashes create an atmosphere of camaraderie. Whether
                            playing water games, floating around on inflatables, or competing in spirited races, the
                            Shared activities promote a sense of belonging and bonding.
                        </p>
                    </div>

                    <div class="col-md-4 mb-1">
                        <i class="fa fa-heart fa-4x orange-text"></i>
                        <h4 class="my-4 font-weight-bold">Happiness</h4>
                        <p class="grey-text">The joy felt while swimming in a pool with friends and family is
                            immeasurable. It's a mix of shared laughter, carefree moments, and the sheer joy of being
                            surrounded by loved ones in a relaxing setting. The buoyancy of the water adds to the
                            lightness of the heart, and the collective joy creates an infectious energy. Every splash
                            and every shared joke contribute to an atmosphere of pure delight. Swimming is a physical
                            activity that releases endorphins, which improves one's overall sense of well-being and
                            happiness.

                        </p>
                    </div>

                    <div class="col-md-4 mb-1">
                        <i class="fa fa-bicycle fa-4x orange-text"></i>
                        <h4 class="my-4 font-weight-bold">Adventure</h4>
                        <p class="grey-text">Having fun in the pool with loved ones can also be an exciting adventure.
                            The water turns into an exciting playground for exploration and discovery, where every dip
                            and plunge is an adventure. Games in the pool like water volleyball, Marco Polo, and
                            synchronized swimming transform the water into an exciting arena with a healthy dose of
                            friendly rivalry and adrenaline. Floating on inflatables turns into a miniature adventure
                            where you have to navigate the pool's currents and feel like you're exploring wackily.
                        </p>
                    </div>
                </div>
            </section>

            <hr class="my-5">

            <section id="packages" class="text-center">
                <h2 class="mb-5 font-weight-bold"> Affordable Packages</h2>
                <div class="container">
                    <div class="row mb-3 text-center">
                        <div class="col-sm-6">
                            <div class="card mb-4 rounded-3 shadow shadow-md">
                                <div class="card-header bg-dark text-white py-3">
                                    <h4 class="my-0 fw-normal">Package 1</h4>
                                </div>
                                <div class="card-body">
                                    <img src="portal/exclusive/imgs/pkg1.jpg" class="card-img-top mb-2"
                                        alt="Package 1 Image">
                                    <a href="../exclusive/exclusivebooking.php?type=Package1&rates=5500"
                                        class="w-100 btn btn-lg btn-outline-primary"><i class="fas fa-book"></i> Book
                                        Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card mb-4 rounded-3 shadow shadow-md">
                                <div class="card-header bg-dark text-white py-3">
                                    <h4 class="my-0 fw-normal">Package 2</h4>
                                </div>
                                <div class="card-body">
                                    <img src="portal/exclusive/imgs/pkg2.jpg" class="card-img-top mb-2"
                                        alt="Package 2 Image">
                                    <a href="../exclusive/exclusivebooking.php?type=Package2&rates=8500"
                                        class="w-100 btn btn-lg btn-outline-primary"><i class="fas fa-book"></i> Book
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!--Section: Gallery-->
            <section id="gallery" class="mb-5">
                <!-- Heading -->
                <h2 class="mb-5 font-weight-bold text-center">Gallery</h2>
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-6 mb-4">
                        <!--Carousel Wrapper-->
                        <div id="carousel-example-1z" class="carousel slide carousel-fade carousel-fade"
                            data-ride="carousel">
                            <!--Indicators-->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                                <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                            </ol>
                            <!--/.Indicators-->
                            <!--Slides-->
                            <?php include_once 'includes/gallery.php';?>
                            <!--/.Slides-->
                            <!--Controls-->
                            <a class="carousel-control-prev" href="#carousel-example-1z" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-example-1z" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            <!--/.Controls-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <a href="" class="teal-text">
                            <h6 class="pb-1"><i class="fa fa-heart"></i><strong> Gallery </strong></h6>
                        </a>
                        <h4 class="mb-3"><strong>Degars Manor History</strong></h4>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia iure vitae enim debitis
                            adipisci veritatis, mollitia ad repellendus, fugit pariatur consequatur libero quae dolore
                            deserunt molestias. Deleniti officiis nihil eius.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, laboriosam. Facilis ratione
                            sed error quaerat quod hic suscipit dolor numquam praesentium necessitatibus, soluta
                            consectetur aut aperiam impedit officia cupiditate et?
                        </p>
                        <p>- <a><strong>Tim Gorgonio Morales</strong></a></p>
                        <a class="btn btn-primary btn-md">Read more</a>
                    </div>
                </div>
            </section>
            <!--Section: Gallery-->
            <hr class="my-5">
            <!--Section: Contact-->
            <section id="contact">
                <!-- Heading -->
                <h2 class="mb-5 font-weight-bold text-center">Message Us</h2>
                <div class="container py-4">
                    <!-- Bootstrap 5 starter form -->
                    <form id="contactForm">
                        <!-- Name input -->
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" id="name" type="text" placeholder="Name"
                                data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                        </div>

                        <!-- Email address input -->
                        <div class="mb-3">
                            <label class="form-label" for="emailAddress">Email Address Or Phone Number</label>
                            <input class="form-control" id="emailAddress" type="email"
                                placeholder="Email Address/phone number" data-sb-validations="required, email" />
                            <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is
                                required.</div>
                            <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is
                                not valid.
                            </div>
                        </div>

                        <!-- Message input -->
                        <div class="mb-3">
                            <label class="form-label" for="message">Message</label>
                            <textarea class="form-control" id="message" type="text" placeholder="Message"
                                style="height: 10rem;" data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">Message is required.</div>
                        </div>

                        <!-- Form submissions success message -->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">Form submission successful!</div>
                        </div>

                        <!-- Form submissions error message -->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>

                        <!-- Form submit button -->
                        <div class="d-grid">
                            <button class="btn btn-dark btn-lg disabled" id="submitButton" type="submit"> <i
                                    class="fas fa-paper-plane"></i> Submit</button>
                        </div>

                    </form>
                </div>
            </section>

        </div>
        <!--Google map-->
        <div class="mapouter">
            <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no"
                    marginheight="0" marginwidth="0"
                    src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Degars Manor&amp;t=h&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                    href="https://www.kokagames.com/fnf-friday-night-funkin-mods/">Friday Night Funkin Mods</a>
            </div>
            <style>
            .mapouter {
                position: relative;
                text-align: right;
                width: 100%;
                height: 400px;
            }

            .gmap_canvas {
                overflow: hidden;
                background: none !important;
                width: 100%;
                height: 400px;
            }

            .gmap_iframe {
                height: 400px !important;
            }
            </style>
        </div>

        </div>
        <!--Grid column-->
        </div>
        <!--Grid row-->
        </section>
        <!--Section: Contact-->
        </div>
    </main>
    <!--Main layout-->
    <!-- Footer -->
    <footer class="page-footer font-small unique-color-dark">
        <div class="container mt-5 mb-4 text-center text-md-left">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                    <h6 class="text-uppercase font-weight-bold">
                        <strong class="text-success">Degars Resort</strong>
                    </h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui libero accusamus laudantium
                        quasi quas perspiciatis repellendus eius! Dolores eligendi officiis ad cum quas, neque suscipit
                        iste dolorem numquam modi laboriosam!
                    </p>
                </div>
                <!-- <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold"><strong>Products</strong></h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p><a href="#!">View list of products</a></p>
                    <p><a href="#!">View Cottages</a></p>
                    <p><a href="#!">View rooms</a></p>
                </div> -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold"><strong>Social Media links</strong></h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p><a href="#!">Facebook</a></p>
                    <p><a href="#!">Email</a></p>
                    <p><a href="#!">Twitter</a></p>
                    <p><a href="#!">Instagram</a></p>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3">
                    <h6 class="text-uppercase font-weight-bold"><strong>Contact</strong></h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p><i class="fas fa-home"></i></i> Silanga, Tangub City</p>
                    <p><i class="fa fa-envelope mr-3"></i> degarsmanor@email.com</p>
                    <p><i class="fa fa-phone mr-3"></i> +639 508 297 97</p>
                    <p><i class="fa fa-print mr-3"></i> +639 262 713 257</p>
                </div>
            </div>
        </div>

    </footer>
    <script>
    // Regular map
    function regular_map() {
        var var_location = new google.maps.LatLng(40.725118, -73.997699);
        var var_mapoptions = {
            center: var_location,
            zoom: 14
        };
        var var_map = new google.maps.Map(document.getElementById("map-container"),
            var_mapoptions);
        var var_marker = new google.maps.Marker({
            position: var_location,
            map: var_map,
            title: "New York"
        });
    }
    // Initialize maps
    google.maps.event.addDomListener(window, 'load', regular_map);
    // Carousel options
    $('.carousel').carousel({
        interval: 3000,
    })
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>