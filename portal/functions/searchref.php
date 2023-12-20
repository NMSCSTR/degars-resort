<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db = mysqli_connect("localhost","root","","capstwo");

if (isset($_POST['searchref'])) {

    function getFirstLetter($str) {
        // Check if the input string is not empty
        if (!empty($str)) {
            // Get the first character of the string
            $firstLetter = strtoupper(substr($str, 0, 1));

            // Check if the first character is an alphabetical character
            if (ctype_alpha($firstLetter)) {
                return $firstLetter;
            } else {
                // If the first character is not alphabetical, handle it accordingly
                return "Non-alphabetic character";
            }
        } else {
            // If the input string is empty, handle it accordingly
            return "Empty string";
        }
    }

    $transaction_ref = $_POST['transaction_ref'];
    $fletter = getFirstLetter($transaction_ref);

    if ($fletter == "r" || $fletter == "R") {
        header('Location: ../exclusive/check.php?transaction_ref=' . $transaction_ref);
    }elseif ($fletter == "w" || $fletter == "W") {
        header('Location: ../exclusive/wcheck.php?transaction_ref=' . $transaction_ref);
    }else {
        echo '<script>alert("Transaction Reference not found"); window.history.back();</script>';
        exit;
    }


} else {
    
}

?>