<!-- <footer class="bd-footer py-4 py-md-5 d-flex justify-content-around">
    <div class="container py-4 py-md-5 px-4 px-md-3">
        <div class="row">
            <div class="col-md-4">
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
            <div class="col-md-2">
                <h5>Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/">Packages</a></li>
                    <li class="mb-2"><a href="/">Exclusive</a></li>
                    <li class="mb-2"><a href="/">Rules</a></li><br>
                </ul>
            </div>
            <div class="col-md-2">
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/">Facebook</a></li>
                    <li class="mb-2"><a href="/">Instagram</a></li>
                    <li class="mb-2"><a href="/">Gmail</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h5>Guides</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/">Getting started</a></li>
                    <li class="mb-2"><a href="/">View Guides</a></li>
                    <li class="mb-2"><a href="/">Webpack</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h5>Other Sites</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/">Airbnb</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer> -->
<style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        footer {
            margin-top: auto;
        }
    </style>


<!-- 
<footer class="page-footer font-small unique-color-dark mt-5">
        <div class="container mt-5 mb-4 text-center text-md-left">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                    <h6 class="text-uppercase font-weight-bold">
                        <strong class="text-success">Degars Manor</strong>
                    </h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui libero accusamus laudantium
                        quasi quas perspiciatis repellendus eius! Dolores eligendi officiis ad cum quas, neque suscipit
                        iste dolorem numquam modi laboriosam!
                    </p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold"><strong>Products</strong></h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p><a href="#!">View rates</a></p>
                    <p><a href="#!">View Cottages</a></p>
                    <p><a href="#!">View rooms</a></p>
                </div>
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
                    <p><i class="fas fa-home"></i> Silanga, Tangub City</p>
                    <p><i class="fa fa-envelope mr-3"></i> degarsmanor@email.com</p>
                    <p><i class="fa fa-phone mr-3"></i> +639 508 297 97</p>
                    <p><i class="fa fa-print mr-3"></i> +639 262 713 257</p>
                </div>
            </div>
        </div>
    </footer> -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
</script>
<script src="sweetalert.js"></script>
<?php 

    if (isset($_SESSION['status']) && $_SESSION['status'] != '') 
    { ?>
        <script>
            Swal.fire({
            position: 'top-center',
            icon: '<?php echo $_SESSION['code'];?>',
            title: '<?php echo $_SESSION['status'];?>',
            html: '<?php echo $_SESSION['code'];?>',
            showConfirmButton: false,
            timer: 2500
        })
        </script>
        <?php 
        unset ($_SESSION['status']); 
        unset ($_SESSION['code']); 
    }
?>


</body>
</html>