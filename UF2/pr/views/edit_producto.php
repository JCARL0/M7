<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    
    <?php if (isset($error)): ?>
        <p style="color:red"><?= $error ?></p>
    <?php endif; ?>

    <?php if (isset($producto)): ?>
        <form action="index.php?url=producto/edit&id=<?= $producto['id'] ?>" method="POST">
            <input type="text" name="titulo" value="<?= htmlspecialchars($producto['titulo']) ?>" required><br>
            <textarea name="descripcion" required><?= htmlspecialchars($producto['descripcion']) ?></textarea><br>
            <input type="number" step="0.01" name="precio" value="<?= htmlspecialchars($producto['precio']) ?>" required><br>
            <input type="text" name="categoria" value="<?= htmlspecialchars($producto['categoria']) ?>" required><br>
            <button type="submit">Actualizar</button>
        </form>
    <?php else: ?>
        <p style="color:red">Producto no encontrado.</p>
    <?php endif; ?>

    <a href="index.php?url=dashboard">Volver al dashboard</a>
</body>
</html>
