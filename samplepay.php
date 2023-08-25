<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-shopping-cart"></i> Checkout</h5><hr>
                        <form action="checkout.php" method="get">
                            <div class="form-group">
                                <label for="amount">Amount:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₱</span>
                                    </div>
                                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter the amount" onblur="formatAmount(this)" required>
                                    <input type="hidden" id="amountInCents" name="amountInCents" value="">
                                </div>
                            </div>
                            <button type="submit"  class="btn btn-primary btn-block"><i class="fas fa-credit-card"></i> Pay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JavaScript for amount formatting -->
    <script>
        function formatAmount(input) {
            // Parse the value and round it to two decimal places
            const amountValue = parseFloat(input.value).toFixed(2);
            // Convert the amount in dollars to cents
            const amountInCents = Math.round(parseFloat(amountValue) * 100);
            // Set the formatted amount (in dollars) back to the input field
            input.value = amountValue;
            // Update the hidden input field with the amount in cents
            document.getElementById('amountInCents').value = amountInCents;
        }
    </script>
</body>
</html>
