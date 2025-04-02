<?php
// Clase modelo base que contiene funcionalidad comun

class Model {
    protected $conn;  // Conexion a la base de datos

    // Constructor que establece la conexion
    public function __construct() {
        require_once __DIR__ . '/../config/database.php';
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Metodo para obtener un usuario por ID
    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>