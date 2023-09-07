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
class Product extends Database{


    public function addProduct($productname, $price, $status, $categoryid) {
        $conn = $this->getConnection();

        $productname = $conn->real_escape_string($productname);
        $price = $conn->real_escape_string($price);
        $status = $conn->real_escape_string($status);
        $categoryid = $conn->real_escape_string($categoryid);

        $addProductSql = "INSERT INTO products (productname, price, status, categoryid) VALUES ('$productname', '$price', '$status', '$categoryid')";

        if ($conn->query($addProductSql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function updateProduct($productid, $productname, $price,$status, $categoryid) {
        $conn = $this->getConnection();

        $productname = $conn->real_escape_string($productname);
        $price = $conn->real_escape_string($price);
        $status = $conn->real_escape_string($status);
        $categoryid = $conn->real_escape_string($categoryid);
        $productid = $conn->real_escape_string($productid);

        $updatProductSql = "UPDATE products SET productname = '$productname', price = '$price',status = '$status', categoryid = '$categoryid' WHERE productid = '$productid'";

        if ($conn->query($updatProductSql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProduct($productid) {
        $conn = $this->getConnection();

        $deleteProductSql = "DELETE FROM products WHERE productid = $productid ";

        if ($conn->query($deleteProductSql) === TRUE) {
            $_SESSION['status'] = "Deleted Successfully";
            $_SESSION['code'] = "success";
            return true;
        } else {
            return false;
        }
    }
}

class category extends Database{

    public function addcategory($categoryname) {
        $conn = $this->getConnection();

        $categoryname = $conn->real_escape_string($categoryname);

        $addcategorysql = "INSERT INTO category (categoryname) VALUES ('$categoryname')";

        if ($conn->query($addcategorysql) === true) {
            $_SESSION['status'] = "Inserted Successfully";
            $_SESSION['code'] = "success";
            return true;
        } else {
            return false;
        }
    }

    public function updatecategory($categoryid, $categoryname) {
        $conn = $this->getConnection();

        $categoryname = $conn->real_escape_string($categoryname);
        $categoryid = $conn->real_escape_string($categoryid);

        $updatcategorySql = "UPDATE category SET categoryname = '$categoryname' WHERE categoryid = '$categoryid'";

        if ($conn->query($updatcategorySql) === true) {
            return true;
        } else {
            return false;
        }
    }

    public function deletecategory($categoryid) {
        $conn = $this->getConnection();

        $categoryid = $conn->real_escape_string($categoryid);

        $deletecategorySql = "DELETE FROM category WHERE categoryid = $categoryid ";

        if ($conn->query($deletecategorySql) === true) {
            $_SESSION['status'] = "Deleted Successfully";
            $_SESSION['code'] = "success";
            return true;
        } else {
            return false;
        }
    }

    public function getAllCategories() {
        $conn = $this->getConnection();

        $sql = "SELECT * FROM category";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

}

class Rules extends Database {

    public function addRules($rules) {
        $conn = $this->getConnection();

        $rules = $conn->real_escape_string($rules);

        $addRulesSql = "INSERT INTO rules (rules) VALUES ('$rules')";
        
        if ($conn->query($addRulesSql) === true) {
            return true;
        } else {
            return false;
        }
    }
        public function updateRules($rulesid, $rules) {
            $conn = $this->getConnection();

            $rules = $conn->real_escape_string($rules);

            $updateRulesSql = "UPDATE rules SET rules='$rules' WHERE id=$rulesid;";

            if ($conn->query($updateRulesSql) === true) {
                return true;
            } else {
                return false;
            }
        }

    public function deleteRules($rulesid) {
        $conn = $this->getConnection();

        $rulesid = $conn->real_escape_string($rulesid);

        $deleteRulesSql = "DELETE FROM rules WHERE id=$rulesid;";
        
        if ($conn->query($deleteRulesSql) === true) {
            return true;
        } else {
            return false;
        }
    }

    public function getRules() {
        $conn = $this->getConnection();

        $getRulesSql = "SELECT * FROM rules";

        $result = $conn->query($getRulesSql);

        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                $rules[] = $row;
            }
            return $rules;
        } else {
            return false;
        }

        $conn->close();
    }

}
class Reservations extends Database {}
class Cottage extends Database {

}

class Package extends Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "capstwo";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: ". $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
class Users extends Database {
    public function addUser($admin_username, $admin_password) {
        $conn = $this->getConnection();

        $admin_username = $conn->real_escape_string($admin_username);
        $admin_password = $conn->real_escape_string($admin_password);

        $addUserSql = "INSERT INTO users (admin_username, admin_password) VALUES ('$admin_username', '$admin_password')";

        if ($conn->query($addUserSql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

}
?>

