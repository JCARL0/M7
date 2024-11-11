<!DOCTYPE html>
<html>
<body>

<h1>Exercici 2: Comptador de Visites </h1>


<?php

function comptadorVisites() {
    // Comprueba si el archivo del contador existe; si no, inicializa el contador a 0
    $counterFile = 'comptador.txt';
    if (!file_exists($counterFile)) {
        file_put_contents($counterFile, '0');
    }

    // Lee el valor del contador actual del archivo
    $visits = (int) file_get_contents($counterFile);

    // Incrementa el contador
    $visits++;

    // Guarda el valor del contador actualizado en el archivo
    file_put_contents($counterFile, $visits);

    // Muestra el recuento de visitas actual
    echo "Number of visits: " . $visits;
}

// Llame a la función para actualizar y mostrar el recuento de visitas
comptadorVisites();

?>


</body>
</html>