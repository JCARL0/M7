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
            echo "Error durante el registro.";
        }
    }

    public function login($email, $password) {
        $user = $this->userModel->login($email, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
        } else {
            echo "Credenciales inválidas.";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: login.php");
    }

    public function deleteUser() {
        $userId = isset($_GET['id']) ? $_GET['id'] : null;

        if ($userId) {
            $result = $this->userModel->deleteUserById($userId);
            if ($result) {
                echo "Usuario eliminado correctamente.";
            } else {
                echo "Error al eliminar el usuario.";
            }
        } else {
            echo "Se requiere el ID del usuario.";
        }
    }
}
?>