<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Accés</h1>
    <form action="process_login.php" method="POST">
        <label for="nom_usuari">Nom d'Usuari:</label>
        <input type="text" name="nom_usuari" id="nom_usuari" required>
        <br>
        <label for="contrasenya">Contrasenya:</label>
        <input type="password" name="contrasenya" id="contrasenya" required>
        <br>
        <button type="submit">Iniciar Sessió</button>
    </form>
</body>
</html>
