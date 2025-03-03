<?php
// client.php

// Funcion para hacer peticiones HTTP usando cURL
function hacerPeticion($url, $metodo = 'GET', $datos = null) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    if ($metodo === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datos));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    } elseif ($metodo === 'DELETE') {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    }

    $respuesta = curl_exec($ch);
    curl_close($ch);
    return json_decode($respuesta, true);
}

// URL de la API
$apiUrl = 'http://localhost/api.php';

// Listar productos (GET)
echo "<h2>Lista de Productos:</h2>";
$productos = hacerPeticion($apiUrl);
if (!empty($productos)) {
    echo "<ul>";
    foreach ($productos as $producto) {
        echo "<li>{$producto['name']} - {$producto['price']}€ 
              <a href='client.php?eliminar={$producto['id']}'>Eliminar</a></li>";
    }
    echo "</ul>";
} else {
    echo "<p>No hay productos disponibles.</p>";
}

// Eliminar producto (DELETE)
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $respuesta = hacerPeticion("$apiUrl?id=$id", 'DELETE');
    echo "<p>{$respuesta['message']}</p>";
    header("Location: client.php"); // Recargar la pagina para ver los cambios
    exit();
}

// Formulario para agregar un nuevo producto (POST)
echo "<h2>Agregar Nuevo Producto:</h2>";
echo "<form method='POST' action='client.php'>
        Nombre: <input type='text' name='name' required><br>
        Precio: <input type='number' step='0.01' name='price' required><br>
        <input type='submit' value='Agregar Producto'>
      </form>";

// Agregar producto (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevoProducto = [
        'name' => $_POST['name'],
        'price' => (float)$_POST['price']
    ];
    $respuesta = hacerPeticion($apiUrl, 'POST', $nuevoProducto);
    echo "<p>Producto agregado: {$respuesta['name']} - {$respuesta['price']}€</p>";
    header("Location: client.php"); // Recargar la pagina para ver los cambios
    exit();
}
?>