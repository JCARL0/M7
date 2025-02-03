<?php
// Muestra el mensaje de error enviado por la URL
$mensaje = $_GET['mensaje'] ?? 'Error desconocido';
echo "<h1>Error: $mensaje</h1>";
?>
