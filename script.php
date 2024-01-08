<?php 
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $message = $_POST['message'];

        if ($message == !null) {
        $response = array('status' => 'success', 'message' => 'success','content' => $message);
            echo json_encode($response);
            exit();
        } else {
            $response = array('status' => 'error', 'message' => 'error','content' => 'None');
            echo json_encode($response);
            exit();
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Invalid request method');
        echo json_encode($response);
        exit();
    }
} else {
    // Not an AJAX request, handle it accordingly (e.g., redirect or show an error)
    echo "Invalid request";
    exit();
}

?>