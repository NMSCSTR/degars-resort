<?php include '../portHeader.php';?>
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
        <p class="fs-5 text-body-secondary">Quickly build an effective pricing table for your potential customers with
            this Bootstrap example.</p>
    </div>
    </header>

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
                            <li>Good for 50 Person only</li><br><br>
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
                            <li>Free 2 Air-Conditioned rooms(Good ror 10 persons)</li>
                            <li>Good for 7O person</li>
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
                            <li>30 users included</li>
                            <li>15 GB of storage</li>
                            <li>Phone and email support</li>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-primary">Book Now</button>
                    </div>
                </div>
            </div>
        </div>
    </main><hr>
    <h4><i class="fas fa-info-circle text-danger"></i> This information also included for all packages</h4>
    <ul>
        <li>Exclusive use of the area</li>
        <li>₱300.00 Corkage fee for drinks & beverages</li>
        <li>₱50.00 per head for excess person</li>
    </ul>
</div>
<?php include '../portFooter.php';?>