<?php
require_once 'vendor/autoload.php';

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevoLibro = [
        'titulo' => $_POST['titulo'],
        'autor' => $_POST['autor'],
        'anio' => $_POST['anio']
    ];

    $libros = json_decode(file_get_contents('libros.json'), true);
    $libros[] = $nuevoLibro;
    file_put_contents('libros.json', json_encode($libros, JSON_PRETTY_PRINT));

    header('Location: index.php');
    exit;
}

// Configurar Twig para usar "project/templates"
$loader = new \Twig\Loader\FilesystemLoader('project/templates');
$twig = new \Twig\Environment($loader);

// Renderizar el formulario
echo $twig->render('agregar_libro.html.twig');
?>