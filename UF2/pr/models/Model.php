<?php
class Model {
    protected $conn;

    public function __construct() {
        require_once __DIR__ . '/../config/database.php';
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>