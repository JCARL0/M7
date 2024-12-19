<?php
session_start();

$host = 'localhost';
$user = 'admin';
$password = 'admin';
$db = 'sistema_acces';

// Conexión a la base de datos
$conn = new mysqli($host, $user, $password);
$conn->select_db($db);

// Obtener datos del formulario
$nom_usuari = $_POST['nom_usuari'] ?? '';
$contrasenya = $_POST['contrasenya'] ?? '';

// Consultar base de datos
$query = $conn->prepare("SELECT * FROM usuaris WHERE nom_usuari = ?");
$query->bind_param("s", $nom_usuari);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($contrasenya, $user['contrasenya'])) {
        $_SESSION['rol'] = $user['rol'];
        $_SESSION['nom_usuari'] = $user['nom_usuari'];
        if ($user['rol'] == 'Administrador') {
            header("Location: admin.php");
        } else {
            header("Location: usuari.php");
        }
        exit();
    }
}

echo "Nom d'usuari o contrasenya incorrectes.";
?>
