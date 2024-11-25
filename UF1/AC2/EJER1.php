<?php
$text = "Estem aprenent PHP";

// 1. Mostra el text al revés.
echo strrev($text);

// 2. Mostra només les paraules "aprenent PHP" utilitzant substr.
echo substr($text, 6);

// 3. Substitueix "PHP" per "programació" en el text.
echo str_replace("PHP", "programació", $text);


?>