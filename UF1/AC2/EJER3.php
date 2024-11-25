<?php
// Declara l'array associatiu alumne
$alumne = [
    "nom" => "Anna",
    "edat" => 20,
    "nota" => 8.5
];

// 1. Mostra el valor de la clau "nom".
echo $alumne["nom"];

// 2. Afegeix una nova clau "curs" amb el valor "DAW".
$alumne["curs"] = "DAW";

// 3. Mostra el nombre total d’elements a l’array.
echo count($alumne);

// 4. Substitueix el valor 20 de la clau “edat” pel valor 18.
$alumne["edat"] = 18;

?>