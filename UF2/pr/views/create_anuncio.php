<!DOCTYPE html>
<html>
<head>
    <title>Crear Anuncio</title>
</head>
<body>
    <h1>Crear Anuncio</h1>
    
    <!-- Mostrar mensaje de error si existe -->
    <?php if (isset($error)): ?>
        <p><?= $error ?></p>
    <?php endif; ?>
    
    <!-- Formulario para crear anuncio con campos requeridos -->
    <form action="index.php?url=anuncio/create" method="POST">
        <input type="text" name="titulo" placeholder="Título" required><br>
        <input type="text" name="nombre" placeholder="Nombre" required><br>
        <textarea name="descripcion" placeholder="Descripción" required></textarea><br>
        <input type="number" name="precio" placeholder="Precio" required><br>
        <input type="text" name="categoria" placeholder="Categoría" required><br>
        <button type="submit">Crear</button>
    </form>
    
    <!-- Enlace para volver al dashboard -->
    <a href="index.php?url=dashboard">Volver al dashboard</a>
</body>
</html>