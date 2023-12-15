<?php include '../portHeader.php'; ?>
<title>Package Booking</title>
<style>
    .pkg {
        max-width: 960px;
    }

    .pricing-header {
        max-width: 700px;
    }
</style>
<div class="container pkg">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal text-body-emphasis">Packages & Pricing</h1>
        <hr class="deep-purple accent-4 mb-4 mt-0 d-inline-block mx-auto" style="width: 380px;">
        <h4>Included for all packages</h4>
        <i class="fas fa-check-circle text-success"></i> Exclusive use of the area | + ₱300.00 Corkage fee for drinks & beverages |
                +₱50.00 per head for excess person</li>
    </div>
    <main>
        <div class="row mb-3 text-center">
            <div class="col-sm-6">
                <div class="card mb-4 rounded-3 shadow shadow-md">
                    <div class="card-header bg-dark text-white py-3">
                        <h4 class="my-0 fw-normal">Package 1</h4>
                    </div>
                    <div class="card-body">
                        <img src="../exclusive/imgs/pkg1.jpg" class="img-fluid mb-2" style="height: 500px;">
                        <a href="../exclusive/exclusivebooking.php?type=Package1&rates=5500"class="w-100 btn btn-lg btn-outline-primary"><i class="fas fa-book"></i> Book Now</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card mb-4 rounded-3 shadow shadow-md">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="my-0 fw-normal">Package 2</h4>
                    </div>
                    <div class="card-body">
                        <!-- <h1 class="card-title pricing-card-title"><span>&#8369</span>8,500.00</h1> -->
                        <img src="../exclusive/imgs/pkg2.jpg" class="img-fluid mb-2" style="height: 500px;">
                        <a href="../exclusive/exclusivebooking.php?type=Package2&rates=8500"class="w-100 btn btn-lg btn-outline-primary"><i class="fas fa-book"></i> Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="pt-2 d-flex justify-content-center">
        <a href="http://192.168.1.4/degars-resort/portal/quickstart.php" class="btn btn-light btn-lg shadow"><i class="fas fa-undo"></i> Back</a>
    </div>
</div>
<?php include '../portFooter.php'; ?>
