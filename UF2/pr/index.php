<?php
// Archivo principal que maneja el enrutamiento de la aplicacion

// Incluir controladores y modelos necesarios
require_once 'controllers/AuthController.php';
require_once 'controllers/AnuncioController.php';
require_once 'models/User.php';

// Iniciar sesion para manejar autenticacion
session_start();

// Verificar conexion a la base de datos
try {
    require_once 'config/database.php';
    $db = new Database();
    $conn = $db->connect();
    // Prueba simple para verificar que la tabla anuncios existe
    $conn->query("SELECT 1 FROM anuncios LIMIT 1");
} catch (PDOException $e) {
    // Si no existe la base de datos, redirigir al setup
    if ($e->getCode() == '1049') {
        header("Location: setup_database.php");
        exit();
    }
}

// Instanciar controladores principales
$authController = new AuthController();
$anuncioController = new AnuncioController();

// Obtener la URL solicitada (para enrutamiento)
$url = $_GET['url'] ?? '';

// Enrutador basico
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
    case 'anuncio/create':
        // Solo administradores pueden crear anuncios
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            $anuncioController->createAnuncio();
        } else {
            header("Location: index.php?url=dashboard");
        }
        break;
    case 'anuncio/edit':
        // Solo administradores pueden editar anuncios
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            $anuncioController->editAnuncio();
        } else {
            header("Location: index.php?url=dashboard");
        }
        break;
    case 'anuncio/delete':
        // Solo administradores pueden eliminar anuncios
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            $anuncioController->deleteAnuncio();
        } else {
            header("Location: index.php?url=dashboard");
        }
        break;
    case 'dashboard':
        // El dashboard requiere autenticacion
        if (isset($_SESSION["user"])) {
            $anuncios = $anuncioController->listAnuncios();
            require 'views/dashboard.php';
        } else {
            header("Location: index.php?url=login");
        }
        break;
    default:
        // Vista por defecto (homepage)
        echo '<!DOCTYPE html>
        <html>
        <head><title>Plataforma de Anuncios</title></head>
        <body>
            <h1>Plataforma de Anuncios</h1>
            <nav>
                <a href="index.php?url=login">Login</a> |
                <a href="index.php?url=register">Registro</a>
            </nav>
        </body>
        </html>';
        break;
}
?>