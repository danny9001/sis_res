<?php
class Database {
    private $host;
    private $username;
    private $password;
    private $database;
    private $conn;

    public function __construct() {
        $this->host = 'tu_host';
        $this->username = 'eventos_user';
        $this->password = '+J3tD4taBaS3R3serv4**';
        $this->database = 'eventos';

        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }
}
