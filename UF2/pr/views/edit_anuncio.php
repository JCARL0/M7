<!DOCTYPE html>
<html>
<head>
    <title>Editar Anuncio</title>
</head>
<body>
    <h1>Editar Anuncio</h1>
    
    <!-- Mostrar error si existe -->
    <?php if (isset($error)): ?>
        <p><?= $error ?></p>
    <?php endif; ?>

    <!-- Formulario de edicion -->
    <?php if (isset($anuncio)): ?>
        <form action="index.php?url=anuncio/edit&id=<?= $anuncio['id'] ?>" method="POST">
            <input type="text" name="titulo" value="<?= htmlspecialchars($anuncio['titulo']) ?>" required><br>
            <input type="text" name="nombre" value="<?= htmlspecialchars($anuncio['nombre']) ?>" required><br>
            <textarea name="descripcion" required><?= htmlspecialchars($anuncio['descripcion']) ?></textarea><br>
            <input type="number" name="precio" value="<?= htmlspecialchars($anuncio['precio']) ?>" required><br>
            <input type="text" name="categoria" value="<?= htmlspecialchars($anuncio['categoria']) ?>" required><br>
            <button type="submit">Actualizar</button>
        </form>
    <?php else: ?>
        <p>Anuncio no encontrado</p> <!-- Mensaje si no existe anuncio -->
    <?php endif; ?>

    <!-- Enlace para volver al dashboard -->
    <a href="index.php?url=dashboard">Volver al dashboard</a>
</body>
</html>