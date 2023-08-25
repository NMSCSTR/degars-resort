<?php

$curl = curl_init();

// Your cURL options (same as before)...
// ...

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // Decode the JSON response to an associative array
  $data = json_decode($response, true);

  // Extract the fields from the response
  $id = $data['data']['id'];
  $type = $data['data']['type'];
  $amount = $data['data']['attributes']['amount'];
  $fee = $data['data']['attributes']['fee'];
  $status = $data['data']['attributes']['status'];
  $checkout_url = $data['data']['attributes']['checkout_url'];
  $reference_number = $data['data']['attributes']['reference_number'];
  $created_at = $data['data']['attributes']['created_at'];

  // Save the extracted fields into the database (assuming MySQL for this example)
  $servername = "your_mysql_server";
  $username = "your_mysql_username";
  $password = "your_mysql_password";
  $dbname = "your_database_name";

  // Create a database connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and execute the INSERT query
  $sql = "INSERT INTO your_table_name (id, type, amount, fee, status, checkout_url, reference_number, created_at)
          VALUES ('$id', '$type', $amount, $fee, '$status', '$checkout_url', '$reference_number', $created_at)";

  if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully.";
  } else {
    echo "Error inserting record: " . $conn->error;
  }

  // Close the database connection
  $conn->close();

  // Redirect the user to the checkout URL
  header("Location: $checkout_url");
  exit; // Make sure to exit after redirection
}
