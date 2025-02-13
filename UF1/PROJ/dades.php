<?php
// Start session and include database connection
session_start();
include 'dades.php'; // Ensure this file sets up a PDO connection as $conn

// Check if the user is logged in
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// Fetch content from the database
try {
    $stmt = $conn->prepare("SELECT titol, descripcio, data_creacio FROM contingut ORDER BY data_creacio DESC");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error retrieving data: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Contingut Dinàmic</title>
</head>
<body>
<h1>Contingut</h1>

<?php if (!empty($results)): ?>
    <ul>
        <?php foreach ($results as $row): ?>
            <li>
                <h3><?= htmlspecialchars($row['titol']) ?></h3>
                <p><?= htmlspecialchars($row['descripcio']) ?></p>
                <small><?= htmlspecialchars($row['data_creacio']) ?></small>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No hi ha contingut disponible.</p>
<?php endif; ?>

</body>
</html>
