<?php
// Incluir archivos con las funciones
require_once __DIR__ . '/../src/pdo.php';
require_once __DIR__ . '/../src/mysqli.php';

echo "<h2>Consulta con PDO</h2>";
// Obtener datos usando PDO
$usuaris_pdo = getUsersPDO($pdo);
foreach ($usuaris_pdo as $usuari) {
    // Mostrar datos de cada usuario
    echo "ID: " . $usuari['id'] . "<br>";
    echo "Nombre: " . $usuari['nom'] . "<br>";
    echo "Email: " . $usuari['email'] . "<br>";
    echo "Producto: " . ($usuari['producte']) . "<br>";
    echo "Precio: " . ($usuari['preu'] ?? '0') . "<br><br>";
}

echo "<h2>Consulta con MySQLi</h2>";
// Obtener datos usando MySQLi
$usuaris_mysqli = getUsersMySQLi($conn);
foreach ($usuaris_mysqli as $usuari) {
    // Mostrar datos de cada usuario
    echo "ID: " . $usuari['id'] . "<br>";
    echo "Nombre: " . $usuari['nom'] . "<br>";
    echo "Email: " . $usuari['email'] . "<br>";
    echo "Producto: " . ($usuari['producte']) . "<br>";
    echo "Precio: " . ($usuari['preu'] ?? '0') . "<br><br>";
}
?>