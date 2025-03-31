<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Producto</title>
</head>
<body>
    <h1>Eliminar Producto</h1>
    
    <?php if (isset($error)): ?>
        <p><?= $error ?></p>
    <?php endif; ?>

    <?php if (isset($producto)): ?>
        <p>Quieres eliminar el producto <b><?= htmlspecialchars($producto['titulo']) ?></b>?</p>
        <form action="index.php?url=producto/delete&id=<?= $producto['id'] ?>" method="POST">
            <button type="submit">Eliminar</button>
        </form>
    <?php else: ?>
        <p>Producto no encontrado</p>
    <?php endif; ?>

    <a href="index.php?url=dashboard">Volver al dashboard</a>
</body>
</html>
