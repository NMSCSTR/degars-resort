<?php include '../portHeader.php';?>
<title>Exclusive Booking</title>

<main>
    <div class="container-sm">
        <div class="row g-0 position-relative">
            <div class="col-md-6 mb-md-0 p-md-4 mb-4">
                <?php include_once 'carousels.php'?>
            </div>
            <div class="col-md-6 p-4 ps-md-0 mt-5">
                <h3 class="mt-0 fw-bold"><i class="fas fa-calendar-alt"></i> Exclusive Reservation</h3>
                <hr>
                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Event name">
                        <label for="floatingInput"><i class="fas fa-pencil-alt"></i> Event Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="floatingInput" placeholder="select date">
                        <label for="floatingInput"><i class="fas fa-calendar-day"></i> Select Date </label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Open this select menu</option>
                            <option value="1">BIG POOL</option>
                            <option value="2">KIDDIE POOL</option>
                        </select>
                        <label for="floatingSelect"><i class="fas fa-swimming-pool"></i> Select Pool</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="rates">
                        <label for="floatingInput"><i class="fas fa-money-bill"></i> Rates</label>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="" class="btn btn-outline-danger"><i class="fas fa-arrow-left"></i> Back</a>
                        <div class="vr"></div>
                        <button type="submit" class="btn btn-dark" name="submitExclusuveReservation">Proceed <i
                                class="fas fa-arrow-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<footer class="bd-footer py-4 py-md-5 mt-5">
    <div class="container py-4 py-md-5 px-4 px-md-3">
        <div class="row">
            <div class="col-lg-5 mb-3">
                <a class="d-inline-flex align-items-center mb-2 text-body-emphasis text-decoration-none" href="/"
                    aria-label="Bootstrap">
                    <img width="40" height="32" class="d-block me-2"
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Diigo.svg/256px-Diigo.svg.png"
                        alt="">
                    <span class="fs-5">Degars Resort</span>
                </a>
                <ul class="list-unstyled small">
                    <li class="mb-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium fugit ullam
                        dolor accusamus et perferendis aperiam sequi quod esse dolorem officiis quo excepturi neque
                        incidunt, nesciunt veritatis quae voluptas dicta?</li>
                    <li class="mb-2"></li>
                    <li class="mb-2 text-dark">
                        <p> Developer: Rhondel M. Pagobo &copy; <script>
                            document.write(new Date().getFullYear())
                            </script>
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-lg-3 offset-lg-1 mb-3">
                <h5>Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/">Packages</a></li>
                    <li class="mb-2"><a href="/">Exclusive</a></li>
                    <li class="mb-2"><a href="/">Rules</a></li><br>
                    <h5>Social Media</h5>
                    <li class="mb-2"><a href="/">Facebook</a></li>
                    <li class="mb-2"><a href="/">Instagram</a></li>
                    <li class="mb-2"><a href="/">Gmail</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-3 offset mb-3">
                <h5>Guides</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/">Getting started</a></li>
                    <li class="mb-2"><a href="/">View Guides</a></li>
                    <li class="mb-2"><a href="/">Webpack</a></li>
                </ul><br>
                <h5>Other Sites</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/" target="_blank"
                            rel="noopener">Airbnb</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<?php include '../portFooter.php';?>