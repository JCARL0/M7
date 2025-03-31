<!DOCTYPE html>
<html>
<head>
    <title>Crear Producto</title>
</head>
<body>
    <h1>Crear Producto</h1>
    <?php if (isset($error)): ?>
        <p><?= $error ?></p>
    <?php endif; ?>
    <form action="index.php?url=producto/create" method="POST">
        <input type="text" name="titulo" placeholder="Titulo" required><br>
        <textarea name="descripcion" placeholder="Descripción" required></textarea><br>
        <input type="number" name="precio" placeholder="Precio" required><br>
        <input type="text" name="categoria" placeholder="Categoria" required><br>
        <button type="submit">Crear</button>
    </form>
    <a href="index.php?url=dashboard">Volver al dashboard</a>
</body>
</html>