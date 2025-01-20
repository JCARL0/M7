<?php
// Configuración de conexión a la base de datos
$host = 'localhost';
$user = 'admin';
$password = 'admin';
$db = 'm7uf1projecte';

// Conexión a la base de datos
$conn = new mysqli($host, $user, $password, $db);

// Comprobar si hay errores de conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
