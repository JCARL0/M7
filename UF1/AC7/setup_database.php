<?php
$host = 'localhost';
$user = 'admin';
$password = 'admin';
$db = 'sistema_acces';

// Conexión a la base de datos
$conn = new mysqli($host, $user, $password);

// Crear base de datos
$conn->query("CREATE DATABASE IF NOT EXISTS $db");
$conn->select_db($db);

// Crear tabla de usuarios
$conn->query("
    CREATE TABLE IF NOT EXISTS usuaris (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom_usuari VARCHAR(50) UNIQUE NOT NULL,
        contrasenya VARCHAR(255) NOT NULL,
        rol ENUM('Administrador', 'Usuari') NOT NULL
    )
");

// Insertar usuarios iniciales
$passwordAdmin = password_hash("admin123", PASSWORD_DEFAULT);
$passwordUser = password_hash("user123", PASSWORD_DEFAULT);

$conn->query("
    INSERT IGNORE INTO usuaris (nom_usuari, contrasenya, rol) 
    VALUES 
        ('admin', '$passwordAdmin', 'Administrador'),
        ('usuari', '$passwordUser', 'Usuari')
");

echo "Base de datos y tabla configuradas correctamente.";
?>