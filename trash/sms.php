
    <?php 

        $phone_number = '09506587329';
        $message_content = "Congratulations, your reservation was approved successfully. Please remember or save the transaction reference: ref54b7. A copy of your receipt has been emailed to you. If you have any questions about this payment, please contact DEGARS RESORT at mariloumercado1955@gmail.com. Thank you for making your reservation!";


        $ch = curl_init();
        $parameters = array(
            'To' => $phone_number,
            'Message' => $message_content

        );
        curl_setopt( $ch, CURLOPT_URL,'http://192.168.1.3:1688/services/api/messaging/' );
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
