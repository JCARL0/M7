<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Declaracion de variables con informacion del usuario
    $nom = "Maria";        // Nombre del usuario
    $edat = 28;            // Edad del usuario
    $ciutat = "Barcelona"; // Ciudad de residencia del usuario
    $actiu = true;         // Estado del usuario (activo o no)
    
    // Muestra la informacion de cada variable con echo y var_dump()
    // Imprime el nombre
    echo "Nombre: ";
    echo $nom;
    echo "<br>";
    var_dump($nom); // Muestra el tipo y valor de $nom
    echo "<br>";

    // Imprime la edad
    echo "Edad: ";
    echo $edat;
    echo "<br>";
    var_dump($edat); // Muestra el tipo y valor de $edat
    echo "<br>";

    // Imprime la ciudad
    echo "Ciudad: ";
    echo $ciutat;
    echo "<br>";
    var_dump($ciutat); // Muestra el tipo y valor de $ciutat
    echo "<br>";

    // Imprime si el usuario esta activo o no
    echo "Usuario activo: ";
    echo $actiu ? 'Si' : 'No';
    echo "<br>";
    var_dump($actiu); // Muestra el tipo y valor de $actiu
    echo "<br>";

    // Funcion para mostrar la informacion del usuario utilizando variables globales
    function mostrarUsuario()
    {
        global $nom, $edat, $ciutat, $actiu; // Definimos las variables como globales
        echo "Informacion del usuario: ";
        echo "Nombre: $nom, Edad: $edat, Ciudad: $ciutat, Activo: ";
        echo $actiu ? 'Si' : 'No';
    }

    // Llama a la funcion para mostrar la informacion del usuario
    mostrarUsuario();
    ?>


</body>

</html>