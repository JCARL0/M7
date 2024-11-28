<!-- Exercici 3:
Crea un programa en PHP que permeƟ simular l'ús de funcions dinàmiques. Imagina que un
usuari pot triar una acció (per exemple, veure un missatge de benvinguda, consultar la data
actual o generar un número aleatori). Normalment, aquestes accions es triarien a través d'un
formulari HTML, però per simplificar la pràcƟca, simula aquest comportament assignant el
valor de l'acció directament a una variable al codi PHP.
El programa ha de fer el següent:
1. Definir tres funcions:
o salutacio(): Retorni un missatge de benvinguda, per exemple, "Hola! Benvingut
al nostre lloc web.".
o dataActual(): Retorni la data i hora actual amb el format YYYY-MM-DD HH:MM
o randomNumber(): Generi i retorni un nombre aleatori entre 1 i 100.
2. Simular la tria de l'acció amb una variable $accio. Aquesta conƟndrà el nom de la
funció a executar.
3. UƟlitzar funcions dinàmiques per executar l'acció triada. Si el valor de $accio no
correspon a cap funció definida, mostra un missatge d'error: "Acció no vàlida.".
4. Imprimir el resultat de cadascuna de les 3 funcions triades. Opcionalment podeu
imprimir el resultat d’una funció no existent. -->
<?php
// Funcion que devuelve un mensaje de saludo
function saludacion()
{
    return "Hola";
}

// Funcion que devuelve la fecha y hora actual
function dataActual()
{
    return date("Y-m-d H:i");
}

// Funcion que genera un numero aleatorio entre 1 y 100
function randomNumber()
{
    return rand(1, 100);
}

// Variable que define que accion se ejecutara
$accion = "saludacion"; // Cambiar por "saludacion", "dataActual" o "randomNumber"

// Verificar si la funcion existe y ejecutarla
if (function_exists($accion)) {
    echo $accion(); // Llama a la funcion segun el valor de $accion
} else {
    echo "Accion no valida."; // Si no existe la funcion, mostrar mensaje de error
}
?>
