<?php
$productos = (new Producto())->getAll();
?>

<h1>Lista de Productos</h1>
<a href="index.php?url=producto/create">Crear Producto</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Categoría</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?= $producto['id'] ?></td>
            <td><?= htmlspecialchars($producto['titulo']) ?></td>
            <td><?= htmlspecialchars($producto['descripcion']) ?></td>
            <td>$<?= htmlspecialchars($producto['precio']) ?></td>
            <td><?= htmlspecialchars($producto['categoria']) ?></td>
            <td>
                <a href="index.php?url=producto/edit&id=<?= $producto['id'] ?>">Editar</a>
                <a href="index.php?url=producto/delete&id=<?= $producto['id'] ?>" style="color:red;">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="index.php?url=logout">Cerrar sesión</a>
<a href="index.php?url=home">Volver al inicio</a>   