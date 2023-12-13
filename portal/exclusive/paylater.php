
<?php
    session_start();    
    include '../portHeader.php';
?>

<title>Exclusive | Pay Later</title>

<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm6">
                <?php 
                    $payLaterUrl = $_GET['payLaterUrl'] ; echo "</br>";
                    $res_id = "&reservation_id=" . $_GET['reservation_id'] ;
                ?>
                <a class="btn btn-primary d-flex justify-content-center" href="<?php echo $payLaterUrl . $res_id ?>">Click to pay</a>
            </div>
        </div>
    </div>

</main>

<?php include '../portFooter.php';?>