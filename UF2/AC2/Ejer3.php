<?php
// Clase base Empleat
class Empleat {
    protected $nom;           // Nombre del empleado
    protected $carrec;        // Cargo del empleado
    protected $salariMensual; // Salario mensual

    // Constructor para inicializar propiedades
    public function __construct($nom, $carrec, $salariMensual) {
        $this->nom = $nom;
        $this->carrec = $carrec;
        $this->salariMensual = $salariMensual;
    }

    // Metodo final que no puede ser sobrescrito
    final public function calcularSalariAnual() {
        return $this->salariMensual * 12;
    }

    // Muestra informacion basica del empleado
    public function mostrarInformacio() {
        echo "Nom: " . $this->nom . " | Carrec: " . $this->carrec . " | Salari Mensual: " . $this->salariMensual . "<br>";
    }
}

// Clase EmpleatFix que hereda de Empleat
class EmpleatFix extends Empleat {
    protected $beneficis; // Beneficios adicionales

    // Constructor que llama al padre y añade beneficios
    public function __construct($nom, $carrec, $salariMensual, $beneficis) {
        parent::__construct($nom, $carrec, $salariMensual);
        $this->beneficis = $beneficis;
    }

    // Muestra informacion incluyendo beneficios
    public function mostrarInformacio() {
        parent::mostrarInformacio();
        echo "Beneficis: " . $this->beneficis . "<br>";
    }
}

// Clase EmpleatTemporal que hereda de Empleat
class EmpleatTemporal extends Empleat {
    protected $contracteDurada; // Duracion del contrato en meses

    // Constructor que llama al padre y añade duracion del contrato
    public function __construct($nom, $carrec, $salariMensual, $contracteDurada) {
        parent::__construct($nom, $carrec, $salariMensual);
        $this->contracteDurada = $contracteDurada;
    }

    // Muestra informacion incluyendo duracion del contrato
    public function mostrarInformacio() {
        parent::mostrarInformacio();
        echo "Durada contracte: " . $this->contracteDurada . " mesos<br>";
    }
}

// Crear instancias y mostrar informacion
$empleatFix = new EmpleatFix("Joan", "Programador", 2000, "Asseguranca medica");
$empleatTemporal = new EmpleatTemporal("Maria", "Dissenyadora grafica", 2500, 6);

$empleatFix->mostrarInformacio();
$empleatTemporal->mostrarInformacio();
?>
