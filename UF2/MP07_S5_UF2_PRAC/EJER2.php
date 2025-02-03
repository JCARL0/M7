<?php
// Verificamos si el formulario se envió
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]); // Elimina espacios en blanco
    $password = $_POST["password"];

    // Validación de datos
    if (empty($usuario) || strlen($password) < 6) {
        // Si falla, redirige a una página de error
        header("Location: error.php?mensaje=Datos incorrectos");
        exit();
    } else {
        // Si es correcto, redirige a la página de bienvenida
        header("Location: bienvenido.php?usuario=" . urlencode($usuario));
        exit();
    }
}
?>
<!-- Formulario HTML -->
<form method="POST">
    <input type="text" name="usuario" placeholder="Usuario">
    <input type="password" name="password" placeholder="Contraseña">
    <button type="submit">Registrar</button>
</form>
