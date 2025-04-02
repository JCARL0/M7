<?php
class Database {
    // Configuracion de conexion
    private $host = "localhost";
    private $dbname = "anuncios";
    private $username = "root";
    private $password = "";
    public $conn;

    // Metodo para establecer conexion
    public function connect() {
        $this->conn = null;
        try {
            // Crear nueva instancia PDO
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}", 
                $this->username, 
                $this->password
            );
            // Configurar PDO para lanzar excepciones en errores
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Propagar la excepcion para manejarla en el llamador
            throw $e;
        }
        return $this->conn;
    }
}
?>