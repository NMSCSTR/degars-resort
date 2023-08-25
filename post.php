<?php
require_once('vendor/autoload.php');

// $client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://api.paymongo.com/v1/sources', [
'body' => '{"data":{"attributes":{"amount":10000,"redirect":{"failed":"https://dashboard.paymongo.com/developers","success":"https://dashboard.paymongo.com/home"},"billing":{"address":{"line1":"Labuyo","line2":"Tangub City","state":"Labuyo, Tangub City","postal_code":"7214","city":"Tangub City"},"name":"Rhondel Pagobo","phone":"09506587329","email":"rhondel.pagobo@nmsc.edu.ph"},"type":"gcash","currency":"PHP"}}}',
'headers' => [
    'accept' => 'application/json',
    'authorization' => 'Basic cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg6cGtfbGl2ZV93bmlaV0tLc0pwNHZTMWtITkFuNnl0Wmg=',
    'content-type' => 'application/json',
],
]);

echo $response->getBody();