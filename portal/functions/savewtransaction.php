<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Redirecting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php 
$db = mysqli_connect("localhost","root","","capstwo");

if (isset($_POST['savewtransaction'])) {

    $transaction_ref = "wref" . substr(uniqid(), 7, 8);
    $wcustomer_id = $_POST['wcustomer_id'];
    $totalentrancefee = $_POST['totalentrancefee'];
    $walkin_id = $_POST['walkin_id'];
    $aminities_id = $_POST['aminities_id'];
    $status = $_POST['status'];
    $totalamount = $_POST['totalamount'] * 100;


    $fwdetails = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `walkin` WHERE walkin_id = '$walkin_id' "));
    $fwcus_details = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `walkincustomer` WHERE wcustomer_id = '$wcustomer_id' "));


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
                'name' => $fwcus_details['firstname'] . ' ' . $fwcus_details['lastname'],
                'email' => $fwcus_details['email_address'],
                'phone' => $fwcus_details['phone_number']

            ],
            'send_email_receipt' => true,
            'show_description' => true,
            'show_line_items' => false,
            'cancel_url' => 'http://192.168.51.5/degars-resort/portal/exclusive/failed.php?walkin_id=' . $walkin_id . '&wcustomer_id=' . $wcustomer_id,
            'description' => 'Walkin Reservation Payment - ' . $transaction_ref,
            'payment_method_types' => [
                'billease',
                'card',
                'dob',
                'dob_ubp',
                'gcash',
                'grab_pay',
                'paymaya'
            ],
            'reference_number' => $transaction_ref,
            'success_url' => 'http://192.168.51.5/degars-resort/portal/exclusive/success.php?walkin_id=' . $walkin_id . '&wcustomer_id=' . $wcustomer_id,
            'line_items' => [
                [
                    'currency' => 'PHP',
                    'amount' => $totalamount,
                    'description' => 'Walkin Reservation Payment',
                    'name' => 'W A L K I N',
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
        $savewtransac= mysqli_query($db, "INSERT INTO `walkin_transac` (`transaction_ref`, `walkin_id`, `wcustomer_id`, `aminities_id`, `totalentrancefee`, `totalamount`, `status`, `checkout_id`, `checkouturl`) VALUES ('$transaction_ref', '$walkin_id', '$wcustomer_id', '$aminities_id', '$totalentrancefee', '$totalamount', '$status', '$checkout_id', '$checkout_url')
        ");

        echo 
        '<h3 style="text-align:center; margin-top: 10em;">
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            Redirecting to checkout page. Please wait!
        </h3>';


        header('Refresh: 1;URL='.$checkout_url);
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