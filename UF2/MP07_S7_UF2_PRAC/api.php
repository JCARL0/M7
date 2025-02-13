<?php
// api.php

// Configurar cabeceras para retornar JSON
header('Content-Type: application/json');

// Ruta al archivo JSON que simula la base de datos
$filename = 'products.json';

// Leer datos existentes
$products = json_decode(file_get_contents($filename), true);

// Obtener metodo HTTP
$method = $_SERVER['REQUEST_METHOD'];

// Manejar metodos
switch ($method) {
    case 'GET':
        // Retornar todos los productos
        echo json_encode($products);
        break;

    case 'POST':
        // Agregar nuevo producto
        $input = json_decode(file_get_contents('php://input'), true);
        $newProduct = [
            'id' => count($products) + 1,
            'name' => $input['name'],
            'price' => $input['price']
        ];
        $products[] = $newProduct;
        file_put_contents($filename, json_encode($products, JSON_PRETTY_PRINT));
        echo json_encode($newProduct);
        break;

    case 'DELETE':
        // Eliminar producto por ID
        if (!isset($_GET['id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'ID no especificado']);
            exit;
        }
        $id = (int)$_GET['id'];
        $products = array_filter($products, fn($product) => $product['id'] !== $id);
        file_put_contents($filename, json_encode(array_values($products), JSON_PRETTY_PRINT));
        echo json_encode(['message' => 'Producto eliminado']);
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Metodo no permitido']);
        break;
}
?>