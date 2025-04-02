<?php
// Modelo para la tabla anuncios

require_once __DIR__ . '/../config/database.php';

class Anuncio {
    private $db;  // Objeto de conexion a la base de datos

    // Constructor que establece la conexion
    public function __construct() {
        $this->db = (new Database())->connect();
    }

    // Crear un nuevo anuncio
    public function create($titulo, $nombre, $descripcion, $precio, $categoria, $user_id) {
        $stmt = $this->db->prepare("INSERT INTO anuncios (titulo, nombre, descripcion, precio, categoria, user_id) 
                                   VALUES (:titulo, :nombre, :descripcion, :precio, :categoria, :user_id)");
        return $stmt->execute([
            ':titulo' => $titulo,
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':precio' => $precio,
            ':categoria' => $categoria,
            ':user_id' => $user_id
        ]);
    }

    // Obtener todos los anuncios
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM anuncios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un anuncio por ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM anuncios WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar un anuncio existente
    public function update($id, $titulo, $nombre, $descripcion, $precio, $categoria) {
        $stmt = $this->db->prepare("UPDATE anuncios SET titulo = :titulo, nombre = :nombre, descripcion = :descripcion, precio = :precio, categoria = :categoria WHERE id = :id");
        return $stmt->execute([
            ':id' => $id,
            ':titulo' => $titulo,
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':precio' => $precio,
            ':categoria' => $categoria
        ]);
    }

    // Eliminar un anuncio
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM anuncios WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
?>