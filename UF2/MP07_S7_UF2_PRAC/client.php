<?php
// client.php

// Funcion para hacer peticiones GET
function obtenerProductos() {
    $ch = curl_init('http://localhost/api.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

// Funcion para eliminar producto
function eliminarProducto($id) {
    $ch = curl_init("http://localhost/api.php?id=$id");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_exec($ch);
    curl_close($ch);
}

// Procesar acciones
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion']) && $_POST['accion'] === 'eliminar') {
        eliminarProducto($_POST['id']);
    } elseif (isset($_POST['accion']) && $_POST['accion'] === 'agregar') {
        $ch = curl_init('http://localhost/api.php');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_exec($ch);
        curl_close($ch);
    }
}

// Obtener lista de productos
$productos = obtenerProductos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda Online</title>
</head>
<body>
    <h1>Productos</h1>
    <ul>
        <?php foreach ($productos as $producto): ?>
            <li>
                <?= $producto['name'] ?> - <?= $producto['price'] ?>€
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="accion" value="eliminar">
                    <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Agregar Producto</h2>
    <form method="POST">
        <input type="hidden" name="accion" value="agregar">
        <input type="text" name="name" placeholder="Nombre" required>
        <input type="number" step="0.01" name="price" placeholder="Precio" required>
        <button type="submit">Agregar</button>
    </form>
</body>
</html>