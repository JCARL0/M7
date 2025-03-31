<?php
require_once __DIR__ . '/../config/database.php';

class Producto {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function create($titulo, $descripcion, $precio, $categoria, $user_id) {
        $stmt = $this->db->prepare("INSERT INTO productos (titulo, descripcion, precio, categoria, user_id) 
                                   VALUES (:titulo, :descripcion, :precio, :categoria, :user_id)");
        return $stmt->execute([
            ':titulo' => $titulo,
            ':descripcion' => $descripcion,
            ':precio' => $precio,
            ':categoria' => $categoria,
            ':user_id' => $user_id
        ]);
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM productos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM productos WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $titulo, $descripcion, $precio, $categoria) {
        $stmt = $this->db->prepare("UPDATE productos SET titulo = :titulo, descripcion = :descripcion, precio = :precio, categoria = :categoria WHERE id = :id");
        return $stmt->execute([
            ':id' => $id,
            ':titulo' => $titulo,
            ':descripcion' => $descripcion,
            ':precio' => $precio,
            ':categoria' => $categoria
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM productos WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
?>
