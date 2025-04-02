<?php
// Controlador para manejar autenticacion (login, registro, logout)

require_once __DIR__ . '/../models/User.php';

class AuthController {
    // Metodo para registrar nuevos usuarios
    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validar y procesar datos del formulario
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $user = new User();
            if ($user->register($name, $email, $password)) {
                // Registro exitoso, redirigir a login
                header("Location: index.php?url=login");
                exit();
            } else {
                // Error en registro, mostrar vista con mensaje
                $error = "Error al registrar usuario";
                require __DIR__ . '/../views/register.php';
            }
        } else {
            // Mostrar formulario de registro
            require __DIR__ . '/../views/register.php';
        }
    }

    // Metodo para manejar inicio de sesion
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $user = new User();
            $userData = $user->login($email, $password);
            
            if ($userData) {
                // Login exitoso, guardar datos en sesion
                $_SESSION["user"] = $userData;
                $_SESSION["role"] = $userData["role"];
                header("Location: index.php?url=dashboard");
                exit();
            } else {
                // Credenciales invalidas
                $error = "Email o contraseña incorrectos";
                require __DIR__ . '/../views/login.php';
            }
        }
    }

    // Metodo para cerrar sesion
    public function logout() {
        // Destruir la sesion y redirigir
        session_destroy();
        header("Location: index.php");
        exit();
    }
}
?>