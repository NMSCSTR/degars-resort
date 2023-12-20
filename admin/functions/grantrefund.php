<?php 
$db = mysqli_connect("localhost","root","","capstwo");

$payment_id = $_GET['payment_id'];
$refundedamount = $_GET['refundedamount'] * 100;
$reason = $_GET['reason'];
$transaction_ref = $_GET['transaction_ref'];
$comres_id = $_GET['comres_id'];
$refund_id = $_GET['refund_id'];

$notes  = "Reason: " . $reason . "(" . $transaction_ref . ")";

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.paymongo.com/refunds",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'data' => [
        'attributes' => [
                'amount' => $refundedamount,
                'notes' => $notes,
                'payment_id' => $payment_id,
                'reason' => 'requested_by_customer'
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
    $refund_data = json_decode($response, true);

    $refund_id = $refund_data['data']['id'];
    $amount = $refund_data['data']['attributes']['amount'];
    $currency = $refund_data['data']['attributes']['currency'];
    $status = $refund_data['data']['attributes']['status'];
    $created_at = $refund_data['data']['attributes']['created_at'];
    $notes = $refund_data['data']['attributes']['notes'];

    // Step 4: Insert data into the database

    $insert = mysqli_query($db,"INSERT INTO listofrefunded (refund_id, amount, currency, status, notes, created_at)
            VALUES ('$refund_id', $amount, '$currency', '$status', '$notes', FROM_UNIXTIME($created_at))");

    $updatecr = mysqli_query($db,"UPDATE `completed_reservation` SET `status` ='Refunded', `approvedby` = '$approvedby' WHERE `comres_id` = $comres_id");
    $updaterefund = mysqli_query($db,"UPDATE `refund` SET `status` ='Refunded', `approvedby` = '$approvedby' WHERE `refund_id` = $refund_id");

    if ($insert && $updatecr && $updaterefund) {
        header("Location: ../refund.php?message=Refund Successful!");
    } else {
        echo "eddf";
    }
    
}
$db->close();