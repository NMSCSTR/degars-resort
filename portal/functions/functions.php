<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "capstwo";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
class Reservations extends Database
{
    public function addReservation($type, $eventname, $reservationdate, $paymentduedate, $rates)
    {
        $conn = $this->getConnection();

        $type = $conn->real_escape_string($type);
        $eventname = $conn->real_escape_string($eventname);
        $reservationdate = $conn->real_escape_string($reservationdate);
        $paymentduedate = $conn->real_escape_string($paymentduedate);
        $rates = $conn->real_escape_string($rates);

        $addReservation = "INSERT INTO reservation (type, eventname, reservationdate, paymentduedate, rates)
        VALUES ('$type','$eventname', '$reservationdate', '$paymentduedate', '$rates')";

        if ($conn->query($addReservation) === true) {
            return true;
        } else {
            return false;
        }
    }

}

?>
