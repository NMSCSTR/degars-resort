<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS Gateway</title>
</head>
<body>
    <?php 

        $phone_number = '09506587329';
        $message_content = 'Congratulations! Mr. Rhondel Pagobo your reservation was approved. Please check your email we have sent a copy of your receipt. If you have any questions about this payment, contact DEGARS RESORT at mariloumercado1955@gmail.com';
        $ch = curl_init();
        $parameters = array(
            'To' => $phoneNumber,
            'Message' => $message_content,
        );
        curl_setopt( $ch, CURLOPT_URL,'http://192.168.1.78:1688/services/api/messaging/' );
        curl_setopt( $ch, CURLOPT_POST, 1 );
        
        //Send the parameters set above with the request
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
        
        // Receive response from server
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $output = curl_exec( $ch );
        curl_close ($ch);
        
        //Show the server response
        echo $output;
    ?>
</body>
</html>