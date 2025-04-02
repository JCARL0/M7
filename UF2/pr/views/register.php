<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h1>Registrar</h1>
    
    <!-- Mostrar error si existe -->
    <?php if (isset($error)): ?>
        <p><?= $error ?></p>
    <?php endif; ?>
    
    <!-- Formulario de registro -->
    <form action="index.php?url=register" method="POST">
        <input type="text" name="name" placeholder="Nombre" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <button type="submit">Registrar</button> <!-- Boton de envio -->
    </form>
    
    <!-- Enlace para login -->
    <p><a href="index.php?url=login">Login</a></p>
</body>
</html>