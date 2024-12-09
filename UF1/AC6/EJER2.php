<?php
// Guardar el color seleccionado a la cookie
if (isset($_POST['color'])) {
    $color = $_POST['color'];
    setcookie("color_fons", $color, time() + 86400, "/"); // Guarda el color del cookie 1 dia
}

// Color del fondo por defecto
$fons = isset($_COOKIE['color_fons']) ? $_COOKIE['color_fons'] : "#FFFFFF";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Color de fondo</title>
</head>
<body style="background-color: <?php echo htmlspecialchars($fons); ?>;">
    <form method="POST" action="">
        <label for="color">Selecciona el color de fons:</label>
        <select name="color" id="color">
            <option value="#ADD8E6">Blau</option>
            <option value="#90EE90">Verd</option>
            <option value="#FFFFE0">Groc</option>
        </select>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
