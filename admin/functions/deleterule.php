<?php 
$db = mysqli_connect('localhost', 'root', '', 'capstwo');
if (isset($_GET['rule_id'])) {
    $rule_id = $_GET['rule_id'];
    
    $delrule = mysqli_query($db, "DELETE FROM `rules` WHERE `rule_id` = '$rule_id'");

    if ($delrule) {
        echo "<script>alert('Rule deleted successfully'); window.location.href = '../rules.php';</script>";
    }else {
        echo "<script>alert('Error: " . $db->error . "');</script>";
    }
    $db->close();
}
?>