<?php
session_start();
if ($_SESSION['rol'] !== 'Administrador') {
    header('Location: login.php');
    exit;
}
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Agregar contenido
    $titol = htmlspecialchars($_POST['titol']);
    $descripcio = htmlspecialchars($_POST['descripcio']);

    $stmt = $conn->prepare("INSERT INTO contingut (titol, descripcio) VALUES (?, ?)");
    $stmt->bind_param("ss", $titol, $descripcio);
    $stmt->execute();
}

// Consulta para obtener los contenidos
$result = $conn->query("SELECT * FROM contingut ORDER BY data_creacio DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Usuarios y Contenidos</title>
</head>
<body>
    <h1>Gestión de Usuarios y Contenidos</h1>

    <!-- Formulario para agregar contenido -->
    <form method="POST">
        <label for="titol">Título:</label>
        <input type="text" name="titol" required>
        <label for="descripcio">Descripción:</label>
        <textarea name="descripcio" required></textarea>
        <button type="submit">Agregar</button>
    </form>

    <!-- Mostrar los contenidos -->
    <h2>Contenidos</h2>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            // Si hay contenidos, los mostramos
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . htmlspecialchars($row['titol']) . " - " . htmlspecialchars($row['data_creacio']) . "</li>";
            }
        } else {
            echo "<li>No hay contenidos disponibles.</li>";
        }
        ?>
    </ul>

    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
