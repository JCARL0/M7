<!-- Exercici 1: Calculadora amb arguments i valors de retorn  -->
<!-- Crea una funció anomenada calculadora que accepƟ tres paràmetres: dos nombres i una 
operació (+, -, *, /). La funció ha de retornar el resultat de l’operació. Si l’operació és una divisió 
i el segon nombre és zero, la funció ha de retornar un missatge d’error. L’usuari pot provar la 
calculadora amb diversos exemples des de la mateixa pàgina. -->
<?php
// Funcion para realizar operaciones matematicas
function calculadora($num1, $num2, $operacion)
{
    // Compara la operacion y devuelve el resultado
    if ($operacion == "+") {
        return $num1 + $num2; // Suma
    } elseif ($operacion == "-") {
        return $num1 - $num2; // Resta
    } elseif ($operacion == "*") {
        return $num1 * $num2; // Multiplicacion
    } elseif ($operacion == "/") {
        if ($num2 == 0) {
            return "Error de division"; // Error si se divide por cero
        } else {
            return $num1 / $num2; // Division
        }
    }
}

// Pruebas de la funcion con diferentes operaciones
echo "Sumar: " . calculadora(10, 5, "+") . "<br>";
echo "Restar: " . calculadora(10, 5, "-") . "<br>";
echo "Multiplicar: " . calculadora(10, 5, "*") . "<br>";
echo "Dividir: " . calculadora(10, 5, "/") . "<br>";
echo "Dividir: " . calculadora(10, 0, "/") . "<br>";
?>