<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titol = htmlspecialchars($_POST['titol']);
    $descripcio = htmlspecialchars($_POST['descripcio']);

    $stmt = $conn->prepare("INSERT INTO contingut (titol, descripcio) VALUES (?, ?)");
    $stmt->bind_param("ss", $titol, $descripcio);
    $stmt->execute();
}

$result = $conn->query("SELECT * FROM contingut ORDER BY data_creacio DESC");
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Formulari</title>
</head>
<body>
    <h1>Formulari d'Inserció i Consulta</h1>
    <a href="logout.php">Tanca Sessió</a>
    <form method="POST">
        <label for="titol">Títol:</label>
        <input type="text" name="titol" id="titol" required>
        <label for="descripcio">Descripció:</label>
        <textarea name="descripcio" id="descripcio" required></textarea>
        <button type="submit">Afegir</button>
    </form>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li><?= htmlspecialchars($row['titol']) ?> - <?= htmlspecialchars($row['data_creacio']) ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
