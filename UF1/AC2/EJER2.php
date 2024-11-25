<?php
$a = 15;
$b = 4;

// 1. Multiplica a per b i guarda el resultat a c.
$c = $a * $b;

// 2. Incrementa c en el valor de b.
$c += $b;

// 3. Divideix c per b i guarda el resultat a d.
$d = $c / $b;

// 4. Mostra el valor final de d i comprova si és major o igual a 10.
echo $d;
if ($d >= 10) {
    echo "El valor és major o igual a 10";
} else {
    echo "El valor és menor que 10";
}


?>