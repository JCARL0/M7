<?php
// Controlador para operaciones con usuarios

class UserController {
    private $userModel;

    // Constructor que recibe el modelo de usuario
    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    // Registrar un nuevo usuario
    public function register($name, $email, $password) {
        if ($this->userModel->register($name, $email, $password)) {
            // Registro exitoso, redirigir a login
            header("Location: login.php");
        } else {
            // Mostrar error
            echo "Error al registrar usuario";
        }
    }

    // Iniciar sesion de usuario
    public function login($email, $password) {
        $user = $this->userModel->login($email, $password);
        if ($user) {
            // Guardar usuario en sesion y redirigir
            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
        } else {
            // Credenciales invalidas
            echo "Credenciales invalidas";
        }
    }

    // Cerrar sesion
    public function logout() {
        // Destruir sesion y redirigir
        session_destroy();
        header("Location: login.php");
    }
}
?>