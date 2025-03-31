<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            if ($this->userModel->register($name, $email, $password)) {
                header("Location: index.php?url=login&success=registered");
                exit();
            } else {
                $error = "Error al registrar usuario";
                require __DIR__ . '/../views/register.php';
            }
        } else {
            require __DIR__ . '/../views/register.php';
        }
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->login($email, $password);

            if ($user) {
                $_SESSION["user"] = $user;
                $_SESSION["role"] = $user['role'];
                header("Location: index.php?url=dashboard");
                exit();
            } else {
                $error = "Credenciales incorrectas";
                require __DIR__ . '/../views/login.php';
            }
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: index.php?url=login");
        exit();
    }
}
?>