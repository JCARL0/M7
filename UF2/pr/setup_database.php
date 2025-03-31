<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $conn->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $conn->exec("USE $dbname");
    
    $conn->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password_hash VARCHAR(255) NOT NULL,
        role ENUM('admin', 'user') DEFAULT 'user',
        creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    
    $conn->exec("CREATE TABLE IF NOT EXISTS productos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255) NOT NULL,
        descripcion TEXT,
        precio DECIMAL(10, 2),
        categoria VARCHAR(50),
        user_id INT,
        creado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    )");
    
    $password_hash = password_hash('admin', PASSWORD_BCRYPT);
    $conn->exec("INSERT IGNORE INTO users (name, email, password_hash, role) 
                VALUES ('admin', 'admin@admin.admin', '$password_hash', 'admin')");
    
    echo '<div style="color:green;">
        <p> Base de datos configurada correctamente</p>
        <a href="index.php">Ir al dashboard</a>
    </div>';

} catch (PDOException $e) {
    echo '<div style="color:red;">
        <p>Error: '.$e->getMessage().'</p>
    </div>';
}

echo '</body></html>';
?>