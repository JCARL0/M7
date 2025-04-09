<?php
// Incluimos la configuracion
require_once __DIR__ . '/../config/config.php';

// Consulta con MySQLi para usuarios con edad mayor a 25
function getUsersMySQLi($conn) {
    // Consulta preparada
    $stmt = $conn->prepare("SELECT * FROM usuaris WHERE edat > ?");
    $edat = 25;
    $stmt->bind_param("i", $edat);
    $stmt->execute();

    // Obtener resultados
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
