<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Usuari') {
    header('Location: login.php');
    exit();
}

require 'db_connection.php';

// Fetch all contingut
$stmt = $conn->query("SELECT * FROM content");
$contents = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Panell d'Usuari</h2>
<h3>Contingut Disponible</h3>
<ul>
    <?php foreach ($contents as $content): ?>
        <li><strong><?= $content['title'] ?></strong>: <?= $content['description'] ?></li>
    <?php endforeach; ?>
</ul>
<a href="logout.php">Tancar Sessió</a>
