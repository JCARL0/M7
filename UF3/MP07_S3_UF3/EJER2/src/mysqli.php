<?php
require_once __DIR__ . '/../config/config.php';

// Funcion para obtener usuarios y sus comandas usando MySQLi
function getUsersMySQLi($conn) {
    // Consulta SQL con JOIN para relacionar usuarios y comandas
    $sql = "SELECT u.id, u.nom, u.email, c.producte, c.preu 
            FROM usuaris u 
            LEFT JOIN comandes c ON u.id = c.usuari_id";
    
    // Ejecutar la consulta
    $result = $conn->query($sql);
    
    // Verificar si hubo error
    if ($result === false) {
        die("Error en la consulta MySQLi: " . $conn->error);
    }
    
    // Retornar resultados como array asociativo
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>