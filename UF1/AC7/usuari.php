<?php
session_start();
if ($_SESSION['rol'] !== 'Usuari') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Usuari</title>
</head>
<body>
    <h1>Benvingut, <?php echo htmlspecialchars($_SESSION['nom_usuari']); ?>!</h1>
    <p>Permís de visualització.</p>
    <a href="logout.php">Tanca la sessió</a>
</body>
</html>
