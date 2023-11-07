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
            position: 'top-end',
            icon: '<?php echo $_SESSION['code'];?>',
            title: '<?php echo $_SESSION['status'];?>',
            showConfirmButton: false,
            timer: 2500
        })
             // html: '<?php echo $_SESSION['code'];?>',
    </script>

        <?php 
        unset ($_SESSION['status']); 
    }
?>

</body>
</html>