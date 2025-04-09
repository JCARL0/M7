<?php
// Incluimos la configuracion
require_once __DIR__ . '/../config/config.php';

// Consulta con PDO para usuarios con edad mayor a 25
function getUsersPDO($pdo) {
    // Consulta preparada
    $sql = "SELECT * FROM usuaris WHERE edat > :edat";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['edat' => 25]);

    // Devolver resultado como array
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
