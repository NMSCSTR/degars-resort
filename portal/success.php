<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <style>
        body {
            text-align: center;
        }

        img {
            max-width: 300px;
            margin: 10px;
        }
    </style>
</head>

<body>
    <h2>Image Gallery</h2>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $db = mysqli_connect("localhost", "root", "", "capstwo");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT receipt_img FROM payviaqr";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imagePath = $row["receipt_img"];
            $imagePath = substr($imagePath, 3);
            // Check if the file exists before displaying it
            if (file_exists($imagePath)) {
                echo '<img src="' . $imagePath . '" alt="Uploaded Image" style="max-width: 300px; margin: 10px;">';
            } else {
                echo 'Image file not found: ' . $imagePath . '<br>';
            }
        }
    } else {
        echo "No images found in the database.";
    }

    $db->close();
    ?>
</body>

</html>
