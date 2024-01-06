<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<?php 
$db = mysqli_connect("localhost","root","","capstwo");

if (isset($_POST['savecompleted'])) {

    $transaction_ref = "ref" . substr(uniqid(), 7, 8);
    $reservation_id = $_POST['reservation_id'];
    $customer_id = $_POST['customer_id'];
    $totalamount = $_POST['totalamount'] * 100;
    
    if ($_POST['modeofpayment'] == 'Full Payment') {
        $modeofpayment = $_POST['modeofpayment'];
        $totalamount = $_POST['totalamount'] * 100;
    } else {
        $modeofpayment = $_POST['modeofpayment'];
        $totalamount = ($_POST['totalamount'] * 100) / 2;
    }
    
    $status = "Pending";
    $servicefee = $_POST['servicefee'];

    $fetch_res_details = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `reservation` WHERE reservation_id = '$reservation_id' "));
    $fetch_cus_details = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `customer` WHERE customer_id = '$customer_id' "));


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
            'billing' => 
            [
                'name' => $fetch_cus_details['firstname'] . ' ' . $fetch_cus_details['lastname'],
                'email' => $fetch_cus_details['email_address'],
                'phone' => $fetch_cus_details['phone_number']

            ],
            'send_email_receipt' => true,
            'show_description' => true,
            'show_line_items' => false,
            'cancel_url' => 'http://192.168.16.152/degars-resort/portal/exclusive/failed.php?reservation_id=' . $reservation_id . '&customer_id=' . $customer_id,
            'description' => 'EXCLUSIVE TRANSACTION PAYMENT : ' . $transaction_ref,
            'payment_method_types' => [
                'gcash',
                'card',
                'dob',
                'dob_ubp',
                'paymaya'
            ],
            'success_url' => 'http://192.168.16.152/degars-resort/portal/exclusive/success.php?reservation_id=' . $reservation_id . '&customer_id=' . $customer_id,
            'line_items' => [
                [
                    'currency' => 'PHP',
                    'amount' => $totalamount,
                    'description' => 'RESORT RESERVATION : ' . $transaction_ref,
                    'name' => 'RESERVATION',
                    'quantity' => 1
                ]
            ]
        ] 
    ]
    ]),
    CURLOPT_HTTPHEADER => [
    "Content-Type: application/json",
    "accept: application/json",
    "authorization: Basic c2tfbGl2ZV9EOThaY0h3ajVZMzU1SDQxMWtRYUVkQlY6c2tfbGl2ZV9EOThaY0h3ajVZMzU1SDQxMWtRYUVkQlY="
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {

    $data = json_decode($response, true);
    if (isset($data['data']['attributes']['checkout_url'])) {

        $checkout_url = $data['data']['attributes']['checkout_url'];
        $checkout_id =  $data['data']['id'];
        
        // Saving the checkout URL to database for later use
        $savecompleted = mysqli_query($db, "INSERT INTO `completed_reservation` (`reservation_id`, `customer_id`, `transaction_ref`, `modeofpayment`, `status`, `servicefee`, `totalamount`,`checkout_id`, `checkouturl`) VALUES ('$reservation_id', '$customer_id','$transaction_ref','$modeofpayment', '$status', '$servicefee', '$totalamount', '$checkout_id','$checkout_url')
        ");

        echo 
        '<h3 style="text-align:center; margin-top: 10em;">
            <div class="d-flex justify-content-center">
                <div class="spinner-border text-dark" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            REDIRECTING TO CHECKOUT PAGE
        </h3>';
        


        header('Refresh: 3;URL='.$checkout_url);
        exit; 

    } else {
        echo "Error";
    }
}

}
$db->close();
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>