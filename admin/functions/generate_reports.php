<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user-selected dates
    $fromDate = $_POST["fromDate"];
    $toDate = $_POST["toDate"];

    if ($fromDate > $toDate) {
        die("Invalid date range");
    }

    $conn = mysqli_connect('localhost', 'root', '', 'capstwo');
    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

     // SQL query to fetch completed reservation data within the date range
     $completedReservationSql = "SELECT * FROM completed_reservation WHERE dateadded BETWEEN '$fromDate' AND '$toDate'";
    $completedReservationResult = $conn->query($completedReservationSql);

     // SQL query to fetch pay via QR transaction data within the date range
     $payViaQrSql = "SELECT * FROM payviaqr WHERE dateqradded BETWEEN '$fromDate' AND '$toDate'";
     $payViaQrResult = $conn->query($payViaQrSql);
 
     // SQL query to fetch walk-in transaction data within the date range
     $walkInTransactionSql = "SELECT * FROM walkin_transac WHERE datewadded BETWEEN '$fromDate' AND '$toDate'";
     $walkInTransactionResult = $conn->query($walkInTransactionSql);

    // Display the reports using DataTables and Bootstrap
    echo "<html>
            <head>
                <link rel='stylesheet' href='https://cdn.datatables.net/1.11.6/css/dataTables.bootstrap5.min.css'>
                <style>
                    body {
                        font-family: 'Poppins', sans-serif;
                    }
                    .container {
                        margin: 20px;
                        padding: 20px;
                    }
                    h2 {
                        margin-top: 20px;
                    }
                </style>
            </head>
            <body>
                <div class='container'>";

    echo "<h2>Completed Reservations Report</h2>";
    displayDataTable($completedReservationResult);

    echo "<h2>Pay via QR Transactions Report</h2>";
    displayDataTable($payViaQrResult);

    echo "<h2>Walk-In Transactions Report</h2>";
    displayDataTable($walkInTransactionResult);

    // Include the latest DataTables and Bootstrap JS scripts
    echo "</div>
            <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
            <script src='https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js'></script>
            <script src='https://cdn.datatables.net/1.11.6/js/dataTables.bootstrap5.min.js'></script>
            <script>
                $(document).ready( function () {
                    $('table').DataTable();
                });
            </script>
            </body>
        </html>";

    // Close connection
    $conn->close();
}

function displayDataTable($result) {
    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>Transaction Ref</th>
                        <th>Total Amount</th>
                        <th>Date Added</th>
                    </tr>
                </thead>
                <tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . (isset($row['transaction_ref']) ? $row['transaction_ref'] : '') . "</td>
                    <td>" . (isset($row['totalamount']) ? $row['totalamount'] : '') . "</td>
                    <td>" . (isset($row['dateadded']) ? $row['dateadded'] : '') . "</td>
                </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "No data found for the selected date range.";
    }
}
?>
