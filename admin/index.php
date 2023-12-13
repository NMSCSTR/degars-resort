<?php

// Retrieve the raw POST data
$payload = file_get_contents("php://input");

// Handle the incoming webhook event
$eventData = json_decode($payload, true);
error_log('Received event: ' . print_r($eventData, true));

// Perform necessary processing based on the event

// Send a response to acknowledge receipt of the event
http_response_code(200);
echo 'Webhook received successfully';
