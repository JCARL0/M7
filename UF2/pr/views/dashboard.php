<?php
$productos = (new Producto())->getAll();
?>

<h1>Lista de Productos</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Categoría</th>
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <th>Acciones</th>
        <?php endif; ?>
    </tr>
    <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?= $producto['id'] ?></td>
            <td><?= htmlspecialchars($producto['titulo']) ?></td>
            <td><?= htmlspecialchars($producto['descripcion']) ?></td>
            <td><?= htmlspecialchars($producto['precio']) ?></td>
            <td><?= htmlspecialchars($producto['categoria']) ?></td>
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <td>
                    <a href="index.php?url=producto/edit&id=<?= $producto['id'] ?>">Editar</a>
                    <a href="index.php?url=producto/delete&id=<?= $producto['id'] ?>">Eliminar</a>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>

<?php if ($_SESSION['role'] === 'admin'): ?>
    <a href="index.php?url=producto/create">Crear Producto</a>
<?php endif; ?>

<p><a href="index.php?url=logout">Cerrar sesion</a></p>