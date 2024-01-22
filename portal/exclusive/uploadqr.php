<?php include '../portHeader.php';?>
<title>Upload Receipt</title>


<main>
    <div class="container mx-auto d-flex justify-content-center align-items-center" style="height: 100vh;">
        
        <form action="" method="post">
            <div class="container mb-2"><img class="img-fluid" id="viewImg" src="" height="500" alt=""></div>
            <div class="form-floating mb-3">
                <input type="file" class="form-control text-uppercase fw-bold" id="inputImg" placeholder="Event name">
                <label for="floatingInput"> Upload receipt</label>
            </div>
            <div class="form-floating mb-3">
                <select 
                class="form-select text-capitalize fw-bold" id="floatingSelect"
                    aria-label="Floating label select example">
                    <option selected>Open this select menu</option>
                    <option value="1">50% Downpayment</option>
                    <option value="2">Full Payment</option>
                </select>
                <label for="floatingSelect"> Select Payment</label>
            </div>
            <div class="dd-grid gap-2 d-md-flex justify-content-md-end mb-3">
                <a href="http://192.168.51.5/degars-resort/portal/exclusive/review.php" class="btn btn-outline-danger">
                    Back
                </a>
                <a href="http://192.168.51.5/degars-resort/portal/exclusive/success.php" class="btn btn-dark">
                    Submit
                </a>
            </div>
        </form>
    </div>
</main>


<script>
    let viewImg = document.getElementById('viewImg');
    let inputImg = document.getElementById('inputImg');

    inputImg.onchange = (e) => {
        if (inputImg.files[0])
            viewImg.src = URL.createObjectURL(inputImg.files[0]);
    };
</script>


<?php include '../portFooter.php';?>