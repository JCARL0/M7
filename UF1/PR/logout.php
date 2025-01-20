<?php
// Iniciar sesión
session_start();
// Destruir la sesión y redirigir a login
session_destroy();
header('Location: login.php');
exit;
?>
