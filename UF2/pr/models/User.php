<?php
// Modelo para la tabla usuarios

require_once __DIR__ . '/Model.php';

class User extends Model {
    // Registrar un nuevo usuario
    public function register($name, $email, $password) {
        // Hashear la contraseña antes de guardarla
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO users (name, email, password_hash, role) VALUES (:name, :email, :password, 'user')";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $hashedPassword);
        return $stmt->execute();
    }

    // Iniciar sesion de usuario
    public function login($email, $password) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Verificar contraseña hasheada
        if ($user && password_verify($password, $user["password_hash"])) {
            return $user;
        }
        return false;
    }

    // Eliminar un usuario por ID
    public function deleteUserById($id) {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>