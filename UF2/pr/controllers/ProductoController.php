<?php
require_once __DIR__ . '/../models/Producto.php';

class ProductoController {
    public function createProducto() {
        if (!isset($_SESSION["user"])) {
            header("Location: index.php?url=login");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];
            $user_id = $_SESSION["user"]["id"];

            $producto = new Producto();
            if ($producto->create($titulo, $descripcion, $precio, $categoria, $user_id)) {
                header("Location: index.php?url=dashboard");
                exit();
            } else {
                $error = "Error al crear producto";
                require __DIR__ . '/../views/create_producto.php';
            }
        } else {
            require __DIR__ . '/../views/create_producto.php';
        }
    }

    public function listProductos() {
        $producto = new Producto();
        return $producto->getAll();
    }

    public function editProducto() {
        if (!isset($_SESSION["user"])) {
            header("Location: index.php?url=login");
            exit();
        }

        $id = $_GET['id'] ?? null;
        $producto = (new Producto())->getById($id);

        if (!$producto) {
            $error = "Producto no encontrado";
            require __DIR__ . '/../views/edit_producto.php';
            return;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];

            $productoModel = new Producto();
            if ($productoModel->update($id, $titulo, $descripcion, $precio, $categoria)) {
                header("Location: index.php?url=dashboard");
                exit();
            } else {
                $error = "Error al actualizar producto";
            }
        }

        require __DIR__ . '/../views/edit_producto.php';
    }

    public function deleteProducto() {
        if (!isset($_SESSION["user"])) {
            header("Location: index.php?url=login");
            exit();
        }

        $id = $_GET['id'] ?? null;
        $producto = (new Producto())->getById($id);

        if (!$producto) {
            $error = "Producto no encontrado";
            require __DIR__ . '/../views/delete_producto.php';
            return;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $productoModel = new Producto();
            if ($productoModel->delete($id)) {
                header("Location: index.php?url=dashboard");
                exit();
            } else {
                $error = "Error al eliminar producto";
            }
        }

        require __DIR__ . '/../views/delete_producto.php';
    }
}
?>
