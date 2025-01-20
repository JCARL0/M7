<?php
// Iniciar sesión
session_start();
include 'db_connection.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Consultar el usuario en la base de datos
    $stmt = $conn->prepare("SELECT * FROM usuaris WHERE nom_usuari = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si el usuario existe y la contraseña es correcta
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['contrasenya'])) {
            // Establecer variables de sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['nom_usuari'];
            $_SESSION['rol'] = $user['rol'];
            // Redirigir según el rol
            header('Location: ' . ($user['rol'] === 'Administrador' ? 'admin.php' : 'usuari.php'));
            exit;
        }
    }
    // Mensaje de error si las credenciales son incorrectas
    $error = "Credenciales incorrectas.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <label for="username">Usuario:</label>
        <input type="text" name="username" required>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
