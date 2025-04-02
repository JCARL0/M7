<?php
class Database {
    // Configuración de conexión
    private $host = "localhost";
    private $dbname = "tienda";
    private $username = "root";
    private $password = "";
    public $conn;

    // Método para conectar a la base de datos
    public function connect() {
        $this->conn = null;
        try {
            // Crear conexión PDO
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}", 
                $this->username, 
                $this->password
            );
            // Configurar modo de error
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw $e;
        }
        return $this->conn;
    }
}
?>