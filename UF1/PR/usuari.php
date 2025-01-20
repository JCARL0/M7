<?php
// Iniciar sesión
session_start();
// Verificar que el usuario sea usuario
if ($_SESSION['rol'] !== 'Usuari') {
    header('Location: login.php');
    exit;
}
include 'db_connection.php';

// Obtener todos los contenidos
$result = $conn->query("SELECT titol, descripcio FROM contingut ORDER BY data_creacio DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Usuario</title>
</head>
<body>
    <h1>Bienvenido, <?= htmlspecialchars($_SESSION['username']) ?></h1>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li><?= htmlspecialchars($row['titol']) ?> - <?= htmlspecialchars($row['descripcio']) ?></li>
        <?php endwhile; ?>
    </ul>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
