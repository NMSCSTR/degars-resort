<?php
$counterFile = 'visitor_count.txt';

// Read current count from the file
$currentCount = (int) file_get_contents($counterFile);

// Increment the count
$newCount = $currentCount + 1;

// Update the file with the new count
file_put_contents($counterFile, $newCount);

// Output the count
echo "Total visitors: $newCount";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Degar Manor</title>
</head>
<body>
    
</body>
</html>