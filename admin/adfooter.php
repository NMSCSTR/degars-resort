
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

<script>
    $('#logout-btn').on('click', function(e){
        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: 'Are you sure you want to logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, I want to logout!'
        }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })

    })
</script>


<!-- <footer class="footer py-3 bg-light">
        <div class="container">
        Copyright &copy; 2023.Degars Resort <br> All rights reserved.<a target="_blank" href="
        </div>

    </footer> -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="resources/js/dashboard.js"></script>
    <script src="resources/js/sweetalert.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

</body>

</html>




