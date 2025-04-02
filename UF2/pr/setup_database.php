<?php
// Configuracion de conexion a MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anuncios";

try {
    // Crear conexion sin especificar base de datos
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Crear base de datos si no existe
    $conn->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $conn->exec("USE $dbname");
    
    // Crear tabla de usuarios
    $conn->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password_hash VARCHAR(255) NOT NULL,
        role ENUM('admin', 'user') DEFAULT 'user',
        creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    
    // Crear tabla de anuncios
    $conn->exec("CREATE TABLE IF NOT EXISTS anuncios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255) NOT NULL,
        nombre VARCHAR(255) NOT NULL,
        descripcion TEXT,
        precio FLOAT NOT NULL,
        categoria VARCHAR(50),
        user_id INT,
        creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    )");
    
    // Insertar usuario administrador por defecto
    $password_hash = password_hash('admin', PASSWORD_BCRYPT);
    $conn->exec("INSERT IGNORE INTO users (name, email, password_hash, role) 
                VALUES ('admin', 'admin@admin.admin', '$password_hash', 'admin')");

} catch (PDOException $e) {
    // Mostrar errores si ocurren
    echo '<div>
            <p>Error: '.$e->getMessage().'</p>
        </div>';
}
?>