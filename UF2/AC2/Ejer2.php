<?php
// Interfaz que define los metodos obligatorios
interface GestioLlibre {
    public function mostrarInformacio();
    public function esPrestat();
}

// Clase Llibre que implementa la interfaz
class Llibre implements GestioLlibre {
    protected $titol;         // Titulo del libro
    protected $autor;         // Autor del libro
    protected $anyPublicacio; // Año de publicacion
    protected $estat;         // Estado (prestado/disponible)

    // Constructor para inicializar propiedades
    public function __construct($titol, $autor, $anyPublicacio) {
        $this->titol = $titol;
        $this->autor = $autor;
        $this->anyPublicacio = $anyPublicacio;
        $this->estat = "disponible";
    }

    // Muestra informacion del libro
    public function mostrarInformacio() {
        echo "Titol: " . $this->titol . " | Autor: " . $this->autor . " | Any: " . $this->anyPublicacio . " | Estat: " . $this->estat . "<br>";
    }

    // Indica si el libro esta prestado
    public function esPrestat() {
        return $this->estat === "prestat";
    }

    // Metodo para prestar el libro
    public function prestar() {
        $this->estat = "prestat";
    }
}

// Clase LlibreDigital que implementa la interfaz
class LlibreDigital implements GestioLlibre {
    protected $titol;
    protected $autor;
    protected $anyPublicacio;
    protected $estat;
    protected $format; // Formato del libro digital (PDF, EPUB)

    // Constructor
    public function __construct($titol, $autor, $anyPublicacio, $format) {
        $this->titol = $titol;
        $this->autor = $autor;
        $this->anyPublicacio = $anyPublicacio;
        $this->estat = "disponible";
        $this->format = $format;
    }

    // Muestra informacion incluyendo formato
    public function mostrarInformacio() {
        echo "Titol: " . $this->titol . " | Autor: " . $this->autor . " | Any: " . $this->anyPublicacio . " | Format: " . $this->format . " | Estat: " . $this->estat . "<br>";
    }

    // Indica si el libro digital esta prestado
    public function esPrestat() {
        return $this->estat === "prestat";
    }

    // Metodo para prestar el libro digital
    public function prestar() {
        $this->estat = "prestat";
    }
}

// Crear instancias y demostrar funcionalidad
$llibreFisic = new Llibre("1984", "George Orwell", 1949);
$llibreDigital = new LlibreDigital("El Petit Princep", "Antoine de Saint-Exupery", 1943, "PDF");

// Prestar el libro fisico
$llibreFisic->prestar();

// Mostrar informacion de los libros
$llibreFisic->mostrarInformacio();
$llibreDigital->mostrarInformacio();
?>
