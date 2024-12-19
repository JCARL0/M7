<?php
session_start();
if ($_SESSION['rol'] !== 'Administrador') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
</head>
<body>
    <h1>Benvingut, <?php echo htmlspecialchars($_SESSION['nom_usuari']); ?>!</h1>
    <p>Permís de gestió.</p>
    <a href="logout.php">Tanca la sessió</a>
</body>
</html>
