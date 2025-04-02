<?php
// Controlador para operaciones CRUD con anuncios

require_once __DIR__ . '/../models/Anuncio.php';

class AnuncioController {
    // Crear un nuevo anuncio
    public function createAnuncio() {
        // Verificar autenticacion y permisos
        if (!isset($_SESSION["user"])) {
            header("Location: index.php?url=login");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recoger datos del formulario
            $titulo = $_POST['titulo'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];
            $user_id = $_SESSION["user"]["id"];

            // Crear el anuncio en la base de datos
            $anuncio = new Anuncio();
            if ($anuncio->create($titulo, $nombre, $descripcion, $precio, $categoria, $user_id)) {
                // Exito, redirigir al dashboard
                header("Location: index.php?url=dashboard");
                exit();
            } else {
                // Error, mostrar vista con mensaje
                $error = "Error al crear anuncio";
                require __DIR__ . '/../views/create_anuncio.php';
            }
        } else {
            // Mostrar formulario de creacion
            require __DIR__ . '/../views/create_anuncio.php';
        }
    }

    // Obtener lista de todos los anuncios
    public function listAnuncios() {
        $anuncio = new Anuncio();
        return $anuncio->getAll();
    }

    // Editar un anuncio existente
    public function editAnuncio() {
        // Verificar autenticacion
        if (!isset($_SESSION["user"])) {
            header("Location: index.php?url=login");
            exit();
        }

        // Obtener ID del anuncio a editar
        $id = $_GET['id'] ?? null;
        $anuncio = (new Anuncio())->getById($id);

        // Verificar que el anuncio existe
        if (!$anuncio) {
            $error = "Anuncio no encontrado";
            require __DIR__ . '/../views/edit_anuncio.php';
            return;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recoger datos del formulario
            $titulo = $_POST['titulo'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $categoria = $_POST['categoria'];

            // Actualizar el anuncio
            $anuncioModel = new Anuncio();
            if ($anuncioModel->update($id, $titulo, $nombre, $descripcion, $precio, $categoria)) {
                // Exito, redirigir al dashboard
                header("Location: index.php?url=dashboard");
                exit();
            } else {
                // Error, mostrar mensaje
                $error = "Error al actualizar anuncio";
            }
        }

        // Mostrar formulario de edicion
        require __DIR__ . '/../views/edit_anuncio.php';
    }

    // Eliminar un anuncio
    public function deleteAnuncio() {
        // Verificar autenticacion
        if (!isset($_SESSION["user"])) {
            header("Location: index.php?url=login");
            exit();
        }

        // Obtener ID del anuncio a eliminar
        $id = $_GET['id'] ?? null;
        $anuncio = (new Anuncio())->getById($id);

        // Verificar que el anuncio existe
        if (!$anuncio) {
            $error = "Anuncio no encontrado";
            require __DIR__ . '/../views/delete_anuncio.php';
            return;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Eliminar el anuncio
            $anuncioModel = new Anuncio();
            if ($anuncioModel->delete($id)) {
                // Exito, redirigir al dashboard
                header("Location: index.php?url=dashboard");
                exit();
            } else {
                // Error, mostrar mensaje
                $error = "Error al eliminar anuncio";
            }
        }

        // Mostrar confirmacion de eliminacion
        require __DIR__ . '/../views/delete_anuncio.php';
    }
}
?>