<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View SMS</title>
</head>
<body>
    
    <?php 
        $ch = curl_init();
        $parameters = array(
            'Destination' => '09950076122',

        );
        curl_setopt( $ch, CURLOPT_URL,'http://192.168.1.78:1688/services/api/call');
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