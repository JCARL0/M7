<?php
class UserController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function register($name, $email, $password) {
        if ($this->userModel->register($name, $email, $password)) {
            header("Location: login.php");
        } else {
            echo "Error al registrar usuario";
        }
    }

    public function login($email, $password) {
        $user = $this->userModel->login($email, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
        } else {
            echo "Credenciales invalidas";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: login.php");
    }
}
?>