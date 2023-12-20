<?php
$db = mysqli_connect("localhost","root","","capstwo");
if ($_SERVER["REQUEST_METHOD"] == "POST") {    
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            
            $transaction_ref = "ref" . substr(uniqid(), 7, 8);
            $reservation_id = $_POST['reservation_id'];
            $customer_id = $_POST['customer_id'];
            $status =  "Pending";
            $gcash_name = $_POST['gcash_name'];
            $gcash_number = $_POST['gcash_number'];
            $servicefee = 0;
            $checkout_id ="Via Qr";
            $checkout_url ="Via Qr";
            

            if ($_POST['mode_of_payment'] == 'Full Payment') {
                $modeofpayment = $_POST['mode_of_payment'];
                $totalamount = $_POST['totalamount'] * 100;
            } else {
                $modeofpayment = $_POST['mode_of_payment'];
                $totalamount = ($_POST['totalamount'] * 100) / 2;
            }

            $sql = "INSERT INTO payviaqr ( `transaction_ref`, `reservation_id`, `customer_id`, `status`, `gcash_name`, `gcash_number`, `mode_of_payment`, `receipt_img`) VALUES ('$transaction_ref','$reservation_id','$customer_id','$status','$gcash_name','$gcash_number','$modeofpayment','$target_file')";

            $savecompleted = mysqli_query($db, "INSERT INTO `completed_reservation` (`reservation_id`, `customer_id`, `transaction_ref`, `modeofpayment`, `status`, `servicefee`, `totalamount`,`checkout_id`, `checkouturl`) VALUES ('$reservation_id', '$customer_id','$transaction_ref','$modeofpayment', '$status', '$servicefee', '$totalamount', '$checkout_id','$checkout_url')
            ");
            if ($db->query($sql) === TRUE) {
                echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded and the record inserted into the database.";
                header('Location: ../success.php?customer_id='.$customer_id.'&reservation_id='.$reservation_id.'');
            } else {
                echo "Error: " . $sql . "<br>" . $db->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$db->close();
