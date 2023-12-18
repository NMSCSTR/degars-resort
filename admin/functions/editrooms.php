<?php
$db = mysqli_connect("localhost","root","","capstwo");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "../roomimgs/";
    $uploadOk = 1;
    $imagePaths = array(); // Array to store file paths of the three images

    // Process each image file
    for ($i = 1; $i <= 3; $i++) {
        // Check if a new file is provided
        if ($_FILES["image$i"]["name"]) {
            $target_file = $target_dir . basename($_FILES["image$i"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a valid image
            $check = getimagesize($_FILES["image$i"]["tmp_name"]);
            if ($check === false) {
                echo "File $i is not a valid image.";
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file $i already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["image$i"]["size"] > 2000000) {
                echo "Sorry, your file $i is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            $allowedFormats = array("jpg", "jpeg", "png", "gif");
            if (!in_array($imageFileType, $allowedFormats)) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed for file $i.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file $i was not uploaded.";
            } else {
                // If everything is okay, try to upload the file
                if (move_uploaded_file($_FILES["image$i"]["tmp_name"], $target_file)) {
                    $imagePaths[] = $target_file; // Store the file path in the array
                } else {
                    echo "Sorry, there was an error uploading your file $i.";
                }
            }
        }
    }

    // If all three images are uploaded successfully
    if ($uploadOk) {
        $name = $_POST['name'];
        $rates = $_POST['rates'];
        $description = $_POST['description'];

        // Extract file paths for image1, image2, and image3
        list($image1, $image2, $image3) = $imagePaths;

        // Check if existing records need to be updated
        if (isset($_POST['aminities_id']) && !empty($_POST['aminities_id'])) {
            $id = $_POST['aminities_id'];

            // Retrieve existing image paths from the database
            $sqlSelect = "SELECT `image1`, `image2`, `image3` FROM `aminities` WHERE `id` = $id";
            $resultSelect = $db->query($sqlSelect);

            if ($resultSelect) {
                $row = $resultSelect->fetch_assoc();

                // Delete files that are not found in the database
                if ($row['image1'] && !in_array($row['image1'], $imagePaths)) {
                    unlink($row['image1']);
                }

                if ($row['image2'] && !in_array($row['image2'], $imagePaths)) {
                    unlink($row['image2']);
                }

                if ($row['image3'] && !in_array($row['image3'], $imagePaths)) {
                    unlink($row['image3']);
                }
            }

            // Update the record in the database
            $sqlUpdate = "UPDATE `room_aminities` SET `name`='$name', `rates`='$rates', `description`='$description', `image1`='$image1', `image2`='$image2', `image3`='$image3' WHERE `id`=$id";

            if ($db->query($sqlUpdate) === TRUE) {
                echo "Record updated successfully.";
                header('Location: ../rooms.php');
            } else {
                echo "Error updating record: " . $db->error;
            }
        } else {
            // Insert a new record into the database
            $sqlInsert = "INSERT INTO `room_aminities` (`name`, `rates`, `description`, `image1`, `image2`, `image3`) VALUES ('$name', '$rates', '$description', '$image1', '$image2', '$image3')";

            if ($db->query($sqlInsert) === TRUE) {
                echo "New record created successfully.";
                header('Location: ../rooms.php');
            } else {
                echo "Error creating record: " . $db->error;
            }
        }
    }
}

$db->close();
?>

