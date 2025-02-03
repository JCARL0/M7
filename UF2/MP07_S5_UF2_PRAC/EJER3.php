<?php
$error = "";
$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Validación de los valores ingresados
        if (!isset($_POST["numerador"]) || !isset($_POST["denominador"])) {
            throw new Exception("Debe completar ambos campos.");
        }

        // Conversión y validación de los números
        $numerador = filter_var($_POST["numerador"], FILTER_VALIDATE_FLOAT);
        $denominador = filter_var($_POST["denominador"], FILTER_VALIDATE_FLOAT);

        if ($numerador === false || $denominador === false) {
            throw new Exception("Los valores deben ser números.");
        }

        if ($denominador == 0) {
            throw new Exception("No se puede dividir por cero.");
        }

        // Realiza la división
        $resultado = $numerador / $denominador;
    } catch (Exception $e) {
        // Manejo de errores y registro en un archivo
        $error = $e->getMessage();
        error_log(date('Y-m-d H:i:s') . " - Error: " . $error . "\n", 3, "error.log");
    }
}
?>
<!-- Formulario HTML -->
<form method="POST">
    <input type="text" name="numerador" placeholder="Numerador">
    <input type="text" name="denominador" placeholder="Denominador">
    <button type="submit">Calcular</button>
</form>
<?php
// Muestra el resultado o el error
if ($resultado !== "") {
    echo "<p>Resultado: $resultado</p>";
}
if ($error) {
    echo "<p>Error: $error</p>";
}
?>
