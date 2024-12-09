<?php
session_start(); // Inicia la session

// Verifica si existe la variable de session
if (!isset($_SESSION['visites'])) {
    $_SESSION['visites'] = 1; // Primera visita
    echo "Benvingut/da! Aquesta és la teva primera visita durant aquesta sessió.";
} else {
    $_SESSION['visites']++; // Contador de numero que visites y que vaya incrementando
    echo "Benvingut/da de nou! Aquesta és la teva visita número " . $_SESSION['visites'] . ".";
}
?>
