<?php
// Iniciar sesión
session_start();
// Verificar que el usuario sea administrador
if ($_SESSION['rol'] !== 'Administrador') {
    header('Location: login.php');
    exit;
}
include 'db_connection.php';

// Procesar el formulario de contenido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titol = htmlspecialchars($_POST['titol']);
    $descripcio = htmlspecialchars($_POST['descripcio']);

    // Insertar un nuevo contenido en la base de datos
    $stmt = $conn->prepare("INSERT INTO contingut (titol, descripcio) VALUES (?, ?)");
    $stmt->bind_param("ss", $titol, $descripcio);
    $stmt->execute();
}

// Obtener todos los contenidos
$result = $conn->query("SELECT * FROM contingut ORDER BY data_creacio DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
</head>
<body>
    <h1>Gestión de Usuarios y Contenidos</h1>
    <form method="POST">
        <label for="titol">Título:</label>
        <input type="text" name="titol" required>
        <label for="descripcio">Descripción:</label>
        <textarea name="descripcio" required></textarea>
        <button type="submit">Agregar</button>
    </form>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li><?= htmlspecialchars($row['titol']) ?> - <?= htmlspecialchars($row['data_creacio']) ?></li>
        <?php endwhile; ?>
    </ul>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
