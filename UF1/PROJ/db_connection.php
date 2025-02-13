<?php
$servername = "localhost";
$username = "admin";
$password = "admin"; 
$dbname = "m7proj";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de connexió a la base de dades: " . $e->getMessage();
    exit();
}
