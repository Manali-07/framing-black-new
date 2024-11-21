<?php
class Database {
    private $connection;

    public function __construct() {
        $host = 'localhost'; // Change if necessary
        $username = 'root'; // Your MySQL username
        $password = 'FB@pass123'; // Your MySQL password
        $dbname = 'framing_black'; // Your database name
        try {
            // Create a PDO instance
            $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // Getter method for the connection
    public function getConnection() {
        return $this->connection;
    }

    public function close() {
        $this->connection = null; // Close the connection
    }
}