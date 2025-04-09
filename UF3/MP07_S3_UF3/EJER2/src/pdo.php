<?php
require_once __DIR__ . '/../config/config.php';

// Funcion para obtener usuarios y sus comandas usando PDO
function getUsersPDO($pdo) {
    try {
        // Consulta SQL con JOIN para relacionar usuarios y comandas
        $sql = "SELECT u.id, u.nom, u.email, c.producte, c.preu 
                FROM usuaris u 
                LEFT JOIN comandes c ON u.id = c.usuari_id";
        
        // Preparar la consulta
        $stmt = $pdo->prepare($sql);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Retornar resultados como array asociativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Mostrar error si falla la consulta
        die("Error en la consulta PDO: " . $e->getMessage());
    }
}
?>