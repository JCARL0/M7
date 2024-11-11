<!DOCTYPE html>
<html>
<body>

<h1>Exercici 1: Informació d'Usuari</h1>

<?php

$nom = "Maria"; //declara el nombre
$edat = 28; //declara la edad 
$ciutat = "Barcelona"; //declara la ciudad
$actiu = true; //declara el activo

var_dump($nom); //imprime el nombre - string(5) "Maria"
var_dump($edat); //imprime la edad - int(28)
var_dump($ciutat); //imprime la ciudad - string(9) "Barcelona"
var_dump($actiu); //imprime el activo - bool(true)

function mostrar() {
    global $nom, $edat, $ciutat, $actiu;
    echo "<br><br><b>$nom</b> con edad de $edat años es de $ciutat y su estado es $actiu";
}

mostrar();

?>

</body>
</html>