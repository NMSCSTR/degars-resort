<?php include '../portHeader.php';?>
<title>Exclusive Booking</title>

<main>
    <div class="container-sm mt-5">
        <div class="row g-0 position-relative">
            <div class="col-md-6 mb-md-0 p-md-4">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://wallpapers.com/images/featured/swimming-pool-sxba30aef9hvkjkc.jpg"
                                class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://tahititourisme.com.au/wp-content/uploads/2017/07/MBRM-Pool-HD-%C2%AE-Charles-Veronese-2.jpg"
                                class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.squarespace-cdn.com/content/v1/5402e23ce4b0a7034afad3a2/1565169019983-XLCFX6MR41F5AM6Y68ZR/intercontinental-faaa.jpg?format=2500w"
                                class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-6 p-4 ps-md-0">
                <h3 class="mt-0 fw-bold">Exclusive Reservation</h3>
                <hr>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Event name">
                    <label for="floatingInput">Event Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="floatingInput" placeholder="select date">
                    <label for="floatingInput">Select Date</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option selected>Open this select menu</option>
                        <option value="1">BIG POOL</option>
                        <option value="2">KIDDIE POOL</option>
                    </select>
                    <label for="floatingSelect">Select Pool</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="rates">
                    <label for="floatingInput">Rates</label>
                </div>
                <div class="d-flex justify-content-end gap-2">
                <a href="" class="btn btn-outline-danger">Back</a>
                <div class="vr"></div>
                <a href="" class="btn btn-dark">Proceed</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../portFooter.php';?>