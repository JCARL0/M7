<?php
// Database connection configuration
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "m7proj";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the database
    $conn->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $conn->exec("USE $dbname");

    // Create the table for usuaris
    $conn->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            role ENUM('Administrador', 'Usuari') NOT NULL
        )
    ");

    // Insert initial usuaris
    $conn->exec("
        INSERT INTO users (username, password, role) VALUES
        ('admin', '" . password_hash("admin123", PASSWORD_DEFAULT) . "', 'Administrador'),
        ('usuari', '" . password_hash("usuari123", PASSWORD_DEFAULT) . "', 'Usuari')
    ");

    // Create the table for contingut
    $conn->exec("
        CREATE TABLE IF NOT EXISTS content (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )
    ");

    echo "Database and tables initialized successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
