<?php
class Animal {
    // Propiedades privadas
    private $nombre;
    private $especie;
    private $edad;
    private $disponible;

    // Constructor
    public function __construct($nombre, $especie, $edad) {
        $this->nombre = $nombre;
        $this->especie = $especie;
        $this->edad = $edad;
        $this->disponible = true; // Por defecto, disponible
    }

    // Getters y setters
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getEspecie() {
        return $this->especie;
    }

    public function setEspecie($especie) {
        $this->especie = $especie;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    // Metodo para saber si esta disponible
    public function esDisponible() {
        return $this->disponible;
    }

    // Metodo para mostrar informacion
    public function mostrarInformacion() {
        echo "Nombre: {$this->nombre}, Especie: {$this->especie}, Edad: {$this->edad}, Disponible: " . ($this->disponible ? "Si" : "No") . "\n";
    }
}

// Crear dos animales
$luna = new Animal("Luna", "perro", 3);
$mimi = new Animal("Mimi", "gato", 2);

// Mostrar informacion
$luna->mostrarInformacion();
$mimi->mostrarInformacion();
?>
