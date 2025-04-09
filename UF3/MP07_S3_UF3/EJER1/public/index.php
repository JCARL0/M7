<?php
// Incluimos funciones de PDO y MySQLi
require_once __DIR__ . '/../src/pdo.php';
require_once __DIR__ . '/../src/mysqli.php';

echo "<h2>Consulta con PDO</h2>";
$usuaris_pdo = getUsersPDO($pdo);
foreach ($usuaris_pdo as $usuari) {
    // Lista de usuarios con PDO
    echo "Nom: " . $usuari['nom'] . "<br>";
    echo "Email: " . $usuari['email'] . "<br>";
    echo "Edat: " . $usuari['edat'] . "<br><br>";
}

echo "<h2>Consulta con MySQLi</h2>";
$usuaris_mysqli = getUsersMySQLi($conn);
foreach ($usuaris_mysqli as $usuari) {
    // lista de usuarios con MySQLi
    echo "Nom: " . $usuari['nom'] . "<br>";
    echo "Email: " . $usuari['email'] . "<br>";
    echo "Edat: " . $usuari['edat'] . "<br><br>";
}
?>
