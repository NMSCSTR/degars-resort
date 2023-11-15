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
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header bg-dark text-white py-3">
                        <h4 class="my-0 fw-normal">Package 1</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title"><span>&#8369</span>5,500.00</h1>
                        <ul class="list-unstyled mt-3 mb-4" style="font-size: 15px;">
                            <li><i class="fas fa-user text-primary"></i> Good for 50 Person only</li><br><br>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-outline-primary">Book Now</button>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header bg-dark text-white py-3">
                        <h4 class="my-0 fw-normal">Package 2</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title"><span>&#8369</span>8,500.00</h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li><i class="fas fa-bed text-primary"></i> Free 2 Air-Conditioned rooms (Good for 10 persons)</li>
                            <li><i class="fas fa-users text-primary"></i> Good for 70 person</li>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-outline-primary">Book Now</button>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-bg-primary border-primary">
                        <h4 class="my-0 fw-normal">Package 3</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">₱12,000.00</h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li><i class="fas fa-users text-primary"></i> 30 users included</li>
                            <li><i class="fas fa-hdd text-primary"></i> 15 GB of storage</li>
                            <li><i class="fas fa-phone text-primary"></i> Phone and email support</li>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-primary">Book Now</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="pt-2">
        <h6 class="mb-0"><a href="http://192.168.1.4/degars-resort/portal/quickstart.php" class="text-body"><i
                class="fas fa-long-arrow-alt-left me-2"></i>Back</a></h6>
    </div>
</div>
<?php include '../portFooter.php'; ?>
