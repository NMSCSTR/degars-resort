
<?php 
session_start(); 
include "../config/db_connection.php";
$redirect = 'http://localhost/final/admin/dashboard.php';

if (isset($_POST['admin_username']) && isset($_POST['admin_password'])) {

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$admin_username = validate($_POST['admin_username']);
	$admin_password= validate($_POST['admin_password']);

	if (empty($admin_username)) {
		header("Location: login.php?error=User Name is required");
		exit();
	}else if(empty($admin_password)){
        header("Location: login.php?error=Password is required");
		exit();
	}else{
		$sql = "SELECT * FROM `admin` WHERE admin_username='$admin_username' AND admin_password='$admin_password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['admin_username'] === $admin_username && $row['admin_password'] === $admin_password) {
				$_SESSION['status'] = "Login Successfully";
				$_SESSION['code'] = "success";
				$_SESSION['admin_username'] = $row['admin_username'];
				$_SESSION['admin_id'] = $row['admin_id'];
				header('Location: ../admin/dashboard.php?'.$_SESSION['status'].$_SESSION['admin_username']);
            }else{
				header("Location: ../login.php?error=Incorect User name or password");
				exit();
			}
		}else{	
			header("Location: ../login.php?error=Incorect User name or password");
			exit();
		}
	}
	
}else{
	header("Location: ../login.php");
	exit();
}
?>	
<?php 
require '../loading.php';
?>

