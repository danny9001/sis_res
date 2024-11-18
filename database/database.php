<?php
require_once 'config.php';

class Database {
    private $conn;

    public function __construct() {
        $this->conn = $conn;
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function close() {
        $this->conn->close();
    }
}
?>
