<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Producto</title>
</head>
<body>
    <!-- Vista para eliminar productos -->
    <h1>Eliminar Producto</h1>
    
    <!-- Mostrar errores si existen -->
    <?php if (isset($error)): ?>
        <p><?= $error ?></p>
    <?php endif; ?>

    <!-- Confirmación de eliminación -->
    <?php if (isset($producto)): ?>
        <p>¿Estás seguro de eliminar el producto <strong><?= htmlspecialchars($producto['titulo']) ?></strong>?</p>
        <form action="index.php?url=producto/delete&id=<?= $producto['id'] ?>" method="POST">
            <button type="submit" style="color:red;">Eliminar</button>
        </form>
    <?php else: ?>
        <p>Producto no encontrado</p>
    <?php endif; ?>

    <!-- Enlace para volver al dashboard -->
    <a href="index.php?url=dashboard">Volver al dashboard</a>
</body>
</html>