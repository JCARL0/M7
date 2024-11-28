<!-- Exercici 2: Funció per generar estadísƟques d’un array -->
<!-- Implementa una funció anomenada estadísƟques que accepƟ com a argument un array de
nombres i retorni un altre array amb informació estadísƟca:
 Suma de tots els elements.
 Valor màxim.
 Valor mínim.
 Mitjana dels valors.
El resultat de la funció s’ha de mostrar en una taula HTML amb les estadísƟques generades. -->
<?php
// Funcion que calcula y muestra estadisticas de un array
function estadisticas($numeros)
{
    // Calcular suma, maximo, minimo y media
    $suma = array_sum($numeros);
    $maximo = max($numeros);
    $minimo = min($numeros);
    $media = $suma / count($numeros);

    // Mostrar en una tabla HTML
    echo "<table border='1'>
            <tr><th>Estadistica</th><th>Valor</th></tr>
            <tr><td>Suma</td><td>{$suma}</td></tr>
            <tr><td>Maximo</td><td>{$maximo}</td></tr>
            <tr><td>Minimo</td><td>{$minimo}</td></tr>
            <tr><td>Media</td><td>{$media}</td></tr>
          </table>";
}

// Array de ejemplo
$numeros = array(10, 20, 30, 40, 50);
// Llamar a la funcion
estadisticas($numeros);
?>