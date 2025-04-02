<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    
    <?php if (isset($error)): ?>
        <p><?= $error ?></p>
    <?php endif; ?>
    
    <form action="index.php?url=login" method="POST">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <button type="submit">Login</button>
    </form>
    
    <p><a href="index.php?url=register">Registrar</a></p>
</body>
</html>