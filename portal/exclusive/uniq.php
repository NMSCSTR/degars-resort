<?php
// Generate a unique reference number starting with "ref"
$referenceNumber = "ref" . substr(uniqid(), 7, 8);

// Display the generated reference number
echo "Generated Reference Number: $referenceNumber";
?>
