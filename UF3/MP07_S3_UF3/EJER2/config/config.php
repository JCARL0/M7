<?php
// Parametros de conexion
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'exercici2';

// Crear DSN para PDO
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

// Conexion MySQLi
$conn = new mysqli($host, $user, $password, $dbname);

// Conexion PDO
try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexion PDO: " . $e->getMessage());
}
?>
