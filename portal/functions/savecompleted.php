<?php 
$db = mysqli_connect("localhost","root","","capstwo");

if (isset($_POST['savecompleted'])) {


    $transaction_ref = "ref" . substr(uniqid(), 7, 8);
    $reservation_id = $_POST['reservation_id'];
    $customer_id = $_POST['customer_id'];
    $modeofpayment = $_POST['modeofpayment'];
    $status = "PENDING";
    $servicefee = $_POST['servicefee'];
    $totalamount = $_POST['totalamount'] * 100;
    $checkouturl = "";

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
            'cancel_url' => 'https://dashboard.paymongo.com/home',
            'description' => 'Resort Reservation payment',
            'payment_method_types' => [
                'gcash',
                'card',
                'dob',
                'dob_ubp',
                'paymaya'
            ],
            'success_url' => 'https://mail.google.com/',
            'line_items' => [
                [
                    'currency' => 'PHP',
                    'amount' => $totalamount,
                    'description' => 'RESORT RESERVATION',
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

        // Saving the checkout URL to database for later use
        $savecompleted = mysqli_query($db, "INSERT INTO `completed_reservation` (`reservation_id`, `customer_id`, `transaction_ref`, `modeofpayment`, `status`, `servicefee`, `totalamount`, `checkouturl`) VALUES ('', '', '', '', '', '', '', '')
        ");

        echo 
        '<h3 style="text-align:center; margin-top: 10em;">
            <div class="spinner-border" role="status">
                <span class="visually-hidden"></span>
            </div>
            Redirecting please wait..
        </h3>';



        header('Refresh: 3;URL='.$checkout_url);
        exit; 

    } else {
        echo "Error";
    }
}



    

}


