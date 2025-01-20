<?php
// Configuración de la base de datos
$host = 'localhost';
$user = 'admin';
$password = 'admin';
$db = 'm7uf1projecte';

// Conexión al servidor MySQL
$conn = new mysqli($host, $user, $password);

// Crear la base de datos si no existe
$conn->query("CREATE DATABASE IF NOT EXISTS $db");
$conn->select_db($db);

// Crear la tabla de usuarios
$conn->query("
    CREATE TABLE IF NOT EXISTS usuaris (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom_usuari VARCHAR(50) UNIQUE NOT NULL,
        contrasenya VARCHAR(255) NOT NULL,
        rol ENUM('Administrador', 'Usuari') NOT NULL
    )
");

// Crear la tabla de contenido
$conn->query("
    CREATE TABLE IF NOT EXISTS contingut (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titol VARCHAR(255) NOT NULL,
        descripcio TEXT NOT NULL,
        data_creacio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");

// Insertar usuarios iniciales si no existen
$passwordAdmin = password_hash("admin123", PASSWORD_DEFAULT);
$passwordUser = password_hash("user123", PASSWORD_DEFAULT);

$conn->query("
    INSERT IGNORE INTO usuaris (nom_usuari, contrasenya, rol) 
    VALUES 
        ('admin', '$passwordAdmin', 'Administrador'),
        ('usuari', '$passwordUser', 'Usuari')
");

echo "Base de datos configurada correctamente.";
?>
