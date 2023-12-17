
    <?php 

        $phone_number = '09506587329';
        $message_content = "Congratulations! Mr. Rhondel Pagobo your reservation was approved copy or save this transaction reference <span style='color: red;'>ref3457gf</span>. Please check your email we have sent a copy of your receipt. If you have any questions about this payment, contact DEGARS RESORT at mariloumercado1955@gmail.com";


        $ch = curl_init();
        $parameters = array(
            'apikey' => '71a0b82e7b5fbd2fb958fcf22d844280', 
            'number' => $phone_number,
            'message' => $message_content,
            'sendername' => 'SEMAPHORE'
        );
        curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
        curl_setopt( $ch, CURLOPT_POST, 1 );
        
        //Send the parameters set above with the request
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
        
        // Receive response from server
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $output = curl_exec( $ch );
        curl_close ($ch);
        //Show the server response
    ?>
