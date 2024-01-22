<?php

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
                'name' => 'Rhondel',
                'email' => 'rhondel.pagobo@nmsc.edu.ph',
                'phone' => '9506587329'
            ],
            'send_email_receipt' => true,
            'show_description' => true,
            'show_line_items' => false,
            'cancel_url' => 'https://192.168.1.4/degars-resort/failed',
            'description' => 'Sample Desc',
            'line_items' => [
                [
                    'currency' => 'PHP',
                    'amount' => 10000,
                    'description' => 'Sampless',
                    'name' => 'Reservation',
                    'quantity' => 1
                ],
                [
                    'currency' => 'PHP',
                    'amount' => 10000,
                    'name' => 'Respay',
                    'quantity' => 1
                ]
                ],
                'reference_number' => 'refnumber',
                'success_url' => 'https://192.168.1.4/degars-resort/success',
                'statement_descriptor' => 'Degars Resort',
                'payment_method_types' => [
                    'gcash',
                    'paymaya'
                ]
        ]
    ]
]),
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "accept: application/json",
        "authorization: Basic c2tfdGVzdF9kZjZMWjdFMk1aaUNLdTRyamlaVkdzV3Q6c2tfdGVzdF9kZjZMWjdFMk1aaUNLdTRyamlaVkdzV3Q="
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}