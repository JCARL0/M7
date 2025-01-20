<?php
class Libro {
    // Propiedades privadas
    private $titulo;
    private $autor;
    private $anio;
    public $estado; // Estado publico

    // Constructor
    public function __construct($titulo, $autor, $anio) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->anio = $anio;
        $this->estado = "disponible"; // Por defecto
    }

    // Getters y setters
    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    // Metodo para prestar el libro
    public function prestarLibro() {
        $this->estado = "prestado";
    }

    // Metodo para devolver el libro
    public function devolverLibro() {
        $this->estado = "disponible";
    }

    // Metodo para mostrar informacion
    public function mostrarInformacion() {
        echo "Titulo: {$this->titulo}, Autor: {$this->autor}, Anio: {$this->anio}, Estado: {$this->estado}\n";
    }
}

// Crear dos libros
$libro1 = new Libro("1984", "George Orwell", 1949);
$libro2 = new Libro("El Principito", "Antoine de Saint-Exupery", 1943);

// Prestar el libro "1984"
$libro1->prestarLibro();

// Mostrar informacion de los libros
$libro1->mostrarInformacion();
$libro2->mostrarInformacion();
?>
