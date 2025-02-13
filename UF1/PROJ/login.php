<?php
session_start();
require 'db_connection.php'; // Connect to the database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check the provided credentials
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Validate the password and set session variables
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user['role'];

        // Redirect based on role
        if ($user['role'] === 'Administrador') {
            header('Location: admin.php');
        } else {
            header('Location: usuari.php');
        }
        exit();
    } else {
        $error = "Nom d'usuari o contrasenya incorrectes!";
    }
}
?>

<!-- HTML Form -->
<form method="POST">
    <h2>Inici de Sessió</h2>
    <input type="text" name="username" placeholder="Nom d'usuari" required>
    <input type="password" name="password" placeholder="Contrasenya" required>
    <button type="submit">Inicia Sessió</button>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</form>
