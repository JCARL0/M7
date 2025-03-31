<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Producto</title>
</head>
<body>
    <h1>Eliminar Producto</h1>
    
    <?php if (isset($error)): ?>
        <p style="color:red"><?= $error ?></p>
    <?php endif; ?>

    <?php if (isset($producto)): ?>
        <p>¿Estás seguro de que deseas eliminar el producto <strong><?= htmlspecialchars($producto['titulo']) ?></strong>?</p>
        <form action="index.php?url=producto/delete&id=<?= $producto['id'] ?>" method="POST">
            <button type="submit" style="color:red;">Eliminar</button>
        </form>
    <?php else: ?>
        <p style="color:red">Producto no encontrado.</p>
    <?php endif; ?>

    <a href="index.php?url=dashboard">Volver al dashboard</a>
</body>
</html>
