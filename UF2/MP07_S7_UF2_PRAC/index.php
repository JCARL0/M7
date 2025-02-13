<?php
require_once 'vendor/autoload.php';

// Configurar Twig para usar "project/templates"
$loader = new \Twig\Loader\FilesystemLoader('project/templates');
$twig = new \Twig\Environment($loader);

// Cargar datos desde libros.json
$libros = json_decode(file_get_contents('libros.json'), true);

// Renderizar la plantilla
echo $twig->render('lista_libros.html.twig', ['libros' => $libros]);
?>