<?php
// Clase abstracta Animal que define la estructura base
abstract class Animal {
    protected $nom;  // Nombre del animal
    protected $edat; // Edad del animal

    // Constructor para inicializar propiedades
    public function __construct($nom, $edat) {
        $this->nom = $nom;
        $this->edat = $edat;
    }

    // Metodo abstracto que deben implementar las subclases
    abstract public function ferSo();

    // Muestra informacion del animal incluyendo su sonido
    public function mostrarInformacio() {
        echo "Nom: " . $this->nom . " | Edat: " . $this->edat . " anys | So: " . $this->ferSo() . "<br>";
    }
}

// Clase Gos que hereda de Animal
class Gos extends Animal {
    // Implementa el metodo para hacer sonido de perro
    public function ferSo() {
        return "Guau!";
    }
}

// Clase Gat que hereda de Animal
class Gat extends Animal {
    // Implementa el metodo para hacer sonido de gato
    public function ferSo() {
        return "Miau!";
    }
}

// Crear instancias y mostrar informacion
$gos = new Gos("Luna", 3);
$gat = new Gat("Mimi", 2);

$gos->mostrarInformacio();
$gat->mostrarInformacio();
?>
