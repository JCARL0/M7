<?php
class Empleado {
    // Propiedades privadas
    private $nombre;
    private $cargo;
    private $salarioMensual;

    // Constructor
    public function __construct($nombre, $cargo, $salarioMensual) {
        $this->nombre = $nombre;
        $this->cargo = $cargo;
        $this->salarioMensual = $salarioMensual;
    }

    // Getters y setters
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Metodo para calcular salario anual
    public function calcularSalarioAnual() {
        return $this->salarioMensual * 12;
    }

    // Metodo para mostrar informacion
    public function mostrarInformacion() {
        $salarioAnual = $this->calcularSalarioAnual();
        echo "Nombre: {$this->nombre}, Cargo: {$this->cargo}, Salario Mensual: {$this->salarioMensual}, Salario Anual: {$salarioAnual}\n";
    }
}

// Crear dos empleados
$joan = new Empleado("Joan", "programador", 2000);
$maria = new Empleado("Maria", "disenadora grafica", 2500);

// Mostrar informacion inicial
$joan->mostrarInformacion();
$maria->mostrarInformacion();

// Modificar salario de Joan y mostrar informacion actualizada
$joan->setNombre("Joan Actualizado");
$joan->mostrarInformacion();
?>
