<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Administrador') {
    header('Location: login.php');
    exit();
}

require 'db_connection.php';

// Insert new contingut
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO content (title, description) VALUES (?, ?)");
    $stmt->execute([$title, $description]);
    $message = "Contingut afegit correctament!";
}

// Retrieve all contingut
$stmt = $conn->query("SELECT * FROM content");
$contents = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Panell d'Administrador</h2>
<form method="POST">
    <input type="text" name="title" placeholder="Títol" required>
    <textarea name="description" placeholder="Descripció" required></textarea>
    <button type="submit">Afegir Contingut</button>
</form>
<?php if (isset($message)) echo "<p>$message</p>"; ?>

<h3>Llista de Contingut</h3>
<ul>
    <?php foreach ($contents as $content): ?>
        <li><strong><?= $content['title'] ?></strong>: <?= $content['description'] ?></li>
    <?php endforeach; ?>
</ul>
<a href="logout.php">Tancar Sessió</a>
