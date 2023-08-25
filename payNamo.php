<html>
<head>
    <title>Gcash</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    @media (min-width: 1200px) {
        .container {
            max-width: 780px;
        }
    }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" method="GET" action="post.php">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" name="firstName" value="Juan" required>
                        <div class="invalid-feedback"> Valid first name is required. </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" name="lastName" value="Cardo" required>
                        <div class="invalid-feedback"> Valid last name is required. </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Mobile</label>
                    <input type="number" class="form-control" name="mobile" value="639171234567">
                    <div class="invalid-feedback"> Please enter a valid mobile number for shipping updates. </div>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="kingpauloaquino@gmail.com">
                    <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" value="Lot 115 block 337 Mentol St" required>
                    <div class="invalid-feedback"> Please enter your shipping address. </div>
                </div>
                <div class="mb-3">
                    <label for="address2">Address 2</label>
                    <input type="text" class="form-control" name="address2" value="Gordon Heights" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="city">City</label>
                        <select class="custom-select d-block w-100" name="city" required>
                            <option value="Olongapo">Choose...</option>
                            <option value="Floridablanca" selected="true">Floridablanca</option>
                            <option value="Olongapo" selected="true">Olongapo</option>
                        </select>
                        <div class="invalid-feedback"> Please select a valid country. </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="state">State/Province</label>
                        <select class="custom-select d-block w-100" name="state" required>
                            <option value="Zambales">Choose...</option>
                            <option value="Pampanga">Pampanga</option>
                            <option value="Zambales" selected="true">Zambales</option>
                        </select>
                        <div class="invalid-feedback"> Please provide a valid state. </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label for="country">Country</label>
                        <select class="custom-select d-block w-100" name="country" required>
                            <option value="PH">Choose...</option>
                            <option value="PH" selected="true">Philippines</option>
                        </select>
                        <div class="invalid-feedback"> Please select a valid country. </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" name="zip" value="2200" required>
                        <div class="invalid-feedback"> Zip code required. </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>
    <footer class="my-3 pt-3 text-muted text-center text-small">
    </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>