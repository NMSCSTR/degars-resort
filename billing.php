<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
<?php

$name = "sample name";
$email = "sample@gmail.com";
$phone = "0950668845446";


$curl = curl_init();

curl_setopt_array($curl, [
CURLOPT_URL => "https://api.paymongo.com/v1/checkout_sessions",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => json_encode([
    'data' => [
        'attributes' => [
            'billing' => [
                'name' => 'Rhondel M. Pagobo',
                'email' => 'rhondelpagobo99@gmail.com',
                'phone' => '09506587329'
            ],
            'send_email_receipt' => true,
            'show_description' => true,
            'show_line_items' => true,
            'cancel_url' => 'https://paymongo.page/l/reservation-failed',
            'description' => 'Reservation payment',
            'line_items' => [
                [
                    'currency' => 'PHP',
                    'amount' => 10000,
                    'description' => 'this payment is for the reservation of the resort',
                    'name' => 'Package 1',
                    'quantity' => 1
                ]
            ],
            'success_url' => 'https://dashboard.paymongo.com/home',
            'payment_method_types' => [
                'gcash',
                'grab_pay',
                'paymaya',
                'dob',
                'card',
                'billease'
            ]
        ]
    ]
]),
CURLOPT_HTTPHEADER => [
    "Content-Type: application/json",
    "accept: application/json",
    "authorization: Basic c2tfbGl2ZV9EOThaY0h3ajVZMzU1SDQx"
],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    // Decode the JSON response to an associative array
    $data = json_decode($response, true);

    // Check if the 'data' key exists in the response
    if (isset($data['data']['attributes']['checkout_url'])) {
        // Extract the checkout URL from the response
        $checkout_url = $data['data']['attributes']['checkout_url'];
        // Redirect the user to the checkout URL
        echo 
        '<h3 style="text-align:center; margin-top: 10em;">
            <div class="spinner-border" role="status">
                <span class="visually-hidden"></span>
            </div>
            Redirecting please wait..
        </h3>';
        header('Refresh: 3;URL='.$checkout_url);
        exit; // Make sure to exit after redirection
    } else {
        // If the response is missing the required data, handle the error gracefully
        echo "Error creating payment link. Please try again later.";
    }
}
?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>