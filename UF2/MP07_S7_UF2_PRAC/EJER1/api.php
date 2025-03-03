<?php
// api.php

// Configuracion basica
header('Content-Type: application/json'); // Indicamos que la respuesta sera en formato JSON
$method = $_SERVER['REQUEST_METHOD']; // Obtenemos el metodo HTTP utilizado (GET, POST, DELETE)

// Ruta al archivo JSON que simula la base de datos
$filename = 'products.json';

// Cargar los productos desde el archivo JSON
if (file_exists($filename)) {
    $products = json_decode(file_get_contents($filename), true);
} else {
    $products = [];
}

// Manejo de las solicitudes
switch ($method) {
    case 'GET':
        // GET: Retorna la lista de productos en formato JSON
        echo json_encode($products);
        break;

    case 'POST':
        // POST: Agrega un nuevo producto
        $input = json_decode(file_get_contents('php://input'), true); // Leer los datos enviados en formato JSON

        if (isset($input['name']) && isset($input['price'])) {
            $newProduct = [
                "id" => count($products) + 1, // Asignar un nuevo ID automaticamente
                "name" => $input['name'],
                "price" => $input['price']
            ];
            $products[] = $newProduct; // Agregar el nuevo producto al array
            file_put_contents($filename, json_encode($products, JSON_PRETTY_PRINT)); // Guardar en el archivo JSON
            echo json_encode($newProduct); // Retornar el nuevo producto en formato JSON
        } else {
            http_response_code(400); // Error si faltan datos
            echo json_encode(["error" => "Faltan campos obligatorios (name y price)"]);
        }
        break;

    case 'DELETE':
        // DELETE: Elimina un producto por su ID
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id']; // Obtener el ID del producto a eliminar
            $initialCount = count($products); // Contar productos antes de la eliminacion

            // Filtrar el array para excluir el producto con el ID especificado
            $products = array_filter($products, function($product) use ($id) {
                return $product['id'] !== $id;
            });

            if (count($products) === $initialCount) {
                http_response_code(404); // Error si no se encontro el producto
                echo json_encode(["error" => "Producto no encontrado"]);
            } else {
                file_put_contents($filename, json_encode($products, JSON_PRETTY_PRINT)); // Guardar cambios en el archivo JSON
                echo json_encode(["message" => "Producto eliminado correctamente"]);
            }
        } else {
            http_response_code(400); // Error si no se proporciona un ID
            echo json_encode(["error" => "ID del producto no especificado"]);
        }
        break;

    default:
        // Manejo de metodos no permitidos
        http_response_code(405); // Metodo no permitido
        echo json_encode(["error" => "Metodo no permitido"]);
        break;
}
?>