<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Definicion de la funcion comptadorVisites
    function comptadorVisites()
    {
        // Variable estatica que conserva su valor entre llamadas a la funcion
        static $comptador = 0;

        // Incrementa el valor del comptador en 1
        $comptador++;

        // Muestra el valor actual del comptador
        echo "Nombre de visites: $comptador<br>";
    }

    // Ejecuta la funcion dos veces para ver el incremento del contador
    comptadorVisites();
    ?>

</body>

</html>