<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Anuncio</title>
</head>
<body>
    <h1>Eliminar Anuncio</h1>
    
    <!-- Mostrar error si existe -->
    <?php if (isset($error)): ?>
        <p><?= $error ?></p>
    <?php endif; ?>

    <!-- Confirmacion de eliminacion -->
    <?php if (isset($anuncio)): ?>
        <p>¿Estás seguro de eliminar el anuncio <strong><?= htmlspecialchars($anuncio['titulo']) ?></strong>?</p>
        <form action="index.php?url=anuncio/delete&id=<?= $anuncio['id'] ?>" method="POST">
            <button type="submit">Eliminar</button> <!-- Boton de confirmacion -->
        </form>
    <?php else: ?>
        <p>Anuncio no encontrado</p> <!-- Mensaje si no existe anuncio -->
    <?php endif; ?>

    <!-- Enlace para volver al dashboard -->
    <a href="index.php?url=dashboard">Volver al dashboard</a>
</body>
</html>