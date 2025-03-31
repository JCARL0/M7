<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h1>Registrar</h1>
    <?php if (isset($_GET['success'])): ?>
        <p>Usuario registrado</p>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <p><?= $error ?></p>
    <?php endif; ?>
    <form action="index.php?url=register" method="POST">
        <input type="text" name="name" placeholder="Nombre" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <button type="submit">Registrar</button>
    </form>
    <p><a href="index.php?url=login">Login</a></p>
</body>
</html>