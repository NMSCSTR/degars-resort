
<?php 
header("Access-Control-Allow-Origin: *");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Embedding Example</title>
</head>
<style>
    iframe {
        width : 100%;
        height : 100%;
    }
</style>
<body>
<!-- Use PHP to dynamically set the iframe source -->
<iframe src="https://www.google.com/search?q=paymongo"></iframe>

</body>
</html>
