<?php
// Obtener todos los anuncios desde el modelo
$anuncios = (new Anuncio())->getAll();
?>

<h1>Lista de Anuncios</h1>
<table border="1"> <!-- Tabla para mostrar anuncios -->
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Categoria</th>
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <th>Acciones</th> <!-- Columna extra para admin -->
        <?php endif; ?>
    </tr>
    
    <!-- Iterar sobre cada anuncio -->
    <?php foreach ($anuncios as $anuncio): ?>
        <tr>
            <!-- Mostrar datos del anuncio con sanitizacion -->
            <td><?= $anuncio['id'] ?></td>
            <td><?= htmlspecialchars($anuncio['titulo']) ?></td>
            <td><?= htmlspecialchars($anuncio['nombre']) ?></td>
            <td><?= htmlspecialchars($anuncio['descripcion']) ?></td>
            <td><?= htmlspecialchars($anuncio['precio']) ?></td>
            <td><?= htmlspecialchars($anuncio['categoria']) ?></td>
            
            <!-- Mostrar acciones solo para admin -->
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <td>
                    <a href="index.php?url=anuncio/edit&id=<?= $anuncio['id'] ?>">Editar</a>
                    <a href="index.php?url=anuncio/delete&id=<?= $anuncio['id'] ?>">Eliminar</a>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>

<!-- Mostrar boton de crear solo para admin -->
<?php if ($_SESSION['role'] === 'admin'): ?>
    <a href="index.php?url=anuncio/create">Crear Anuncio</a>
<?php endif; ?>

<!-- Enlace para cerrar sesion -->
<p><a href="index.php?url=logout">Cerrar sesion</a></p>