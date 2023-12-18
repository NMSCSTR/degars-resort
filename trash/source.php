<?php

$curl = curl_init();

curl_setopt_array($curl, [
CURLOPT_URL => "https://api.paymongo.com/v1/sources",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => json_encode([
    'data' => [
        'attributes' => [
                'amount' => 10000,
                'redirect' => [
                                'success' => 'https://dashboard.paymongo.com/home',
                                'failed' => 'https://dashboard.paymongo.com/pages'
                ],
                'billing' => [
                                'name' => 'Raffy Mandawe',
                                'phone' => '09506587329',
                                'email' => 'rhondelpagobo99@gmail.com'
                ],
                'type' => 'gcash',
                'currency' => 'PHP'
        ]
    ]
]),
CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "authorization: Basic c2tfbGl2ZV9EOThaY0h3ajVZMzU1SDQxMWtRYUVkQlY6c2tfbGl2ZV9EOThaY0h3ajVZMzU1SDQxMWtRYUVkQlY=",
    "content-type: application/json"
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