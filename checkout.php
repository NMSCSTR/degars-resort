<?php

// Function to validate and sanitize the input amount
function validateAmountInCents($input) {
    // Make sure it is a numeric value and greater than 0
    if (!is_numeric($input) || $input <= 0) {
        return false;
    }
    // Sanitize the input to remove any non-numeric characters
    return intval($input);
}

// Check if 'amountInCents' is set and valid
if (!isset($_GET['amountInCents']) || !($amountInCents = validateAmountInCents($_GET['amountInCents']))) {
    // Invalid or missing amount, handle the error gracefully
    echo "Invalid amount. Please provide a valid amount.";
    exit;
}

// Replace 'YOUR_BASE64_ENCODED_API_CREDENTIALS' with your actual base64-encoded credentials
$API = 'c2tfbGl2ZV9EOThaY0h3ajVZMzU1SDQxMWtRYUVkQlY6c2tfbGl2ZV9EOThaY0h3ajVZMzU1SDQxMWtRYUVkQlY=';

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.paymongo.com/v1/links",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
        'data' => [
            'attributes' => [
                'amount' => $amountInCents,
                'description' => 'thisisatest',
                'remarks' => 'thisisatestremarks'
            ]
        ]
    ]),
    CURLOPT_HTTPHEADER => [
        "accept: application/json",
        "authorization: Basic $API",
        "content-type: application/json"
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
        header('Refresh: 5;URL='.$checkout_url);
        exit; // Make sure to exit after redirection
    } else {
        // If the response is missing the required data, handle the error gracefully
        echo "Error creating payment link. Please try again later.";
    }
}
?>
<?php include 'loading.php' ?>