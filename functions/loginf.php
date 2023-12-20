<?php 
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../config/db_connection.php";

if (isset($_POST['users_username']) && isset($_POST['users_password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $users_username = validate($_POST['users_username']);
    $users_password = validate($_POST['users_password']);

    if (empty($users_username)) {
        header("Location: login.php?error=User Name is required");
        exit();
    } else if (empty($users_password)){
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        // Hash the entered password using SHA-256 consistently
        $hashedPassword = hash('sha256', $users_password);

        $sql = "SELECT * FROM `admin` WHERE users_username='$users_username'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            
            // Compare hashed password
            if ($row['users_password'] === $hashedPassword) {
                $_SESSION['status'] = "Login Successfully";
                $_SESSION['code'] = "success";
                $_SESSION['users_username'] = $row['users_username'];
                $_SESSION['users_role'] = $row['users_role'];
                $_SESSION['users_id'] = $row['users_id'];
                header('Location: ../admin/dashboard.php?' . $_SESSION['status'] . $_SESSION['users_username']);
            } else {
                header("Location: ../login.php?error=Incorrect User name or password");
                exit();
            }
        } else {    
            header("Location: ../login.php?error=Incorrect User name or password");
            exit();
        }
    }
    
} else {
    header("Location: ../login.php");
    exit();
}
?>
<?php 
require '../loading.php';
?>
