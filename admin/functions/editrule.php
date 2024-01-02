<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'capstwo');
if (isset($_POST['editrule'])) {

    $rule_id = $_POST['rule_id'];
    $type = $_POST['type'];
    $rules = $_POST['rules'];
    
    $updaterule = mysqli_query($db, "UPDATE `rules` SET `type`='$type',`rules`='$rules' WHERE `rule_id` = '$rule_id'");

    if ($updaterule) {
        $_SESSION['status'] = "Rule Updated Successfully";
        $_SESSION['code'] = "success";
        header("Location: ../rules.php");
        // echo "<script>alert('Rule updated successfully'); window.location.href = '../rules.php';</script>";
    }else {
        echo "<script>alert('Error: " . $db->error . "');</script>";
    }
    $db->close();
}
?>