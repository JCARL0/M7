<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/ProductoController.php';
require_once 'models/User.php';

session_start();

try {
    require_once 'config/database.php';
    $db = new Database();
    $conn = $db->connect();
    $conn->query("SELECT 1 FROM productos LIMIT 1");
} catch (PDOException $e) {
    if ($e->getCode() == '1049') {
        header("Location: setup_database.php");
        exit();
    }
}

$authController = new AuthController();
$productoController = new ProductoController();

$url = $_GET['url'] ?? '';

switch ($url) {
    case 'register':
        $authController->register();
        break;
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->login();
        } else {
            require 'views/login.php';
        }
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'producto/create':
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            $productoController->createProducto();
        } else {
            header("Location: index.php?url=dashboard");
        }
        break;
    case 'producto/edit':
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            $productoController->editProducto();
        } else {
            header("Location: index.php?url=dashboard");
        }
        break;
    case 'producto/delete':
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            $productoController->deleteProducto();
        } else {
            header("Location: index.php?url=dashboard");
        }
        break;
    case 'dashboard':
        if (isset($_SESSION["user"])) {
            $productos = $productoController->listProductos();
            require 'views/dashboard.php';
        } else {
            header("Location: index.php?url=login");
        }
        break;
    default:
        echo '<!DOCTYPE html>
        <html>
        <head><title>Tienda</title></head>
        <body>
            <h1>Tienda</h1>
            <nav>
                <a href="index.php?url=login">Login</a> |
                <a href="index.php?url=register">Registro</a>
            </nav>
        </body>
        </html>';
        break;
}
?>