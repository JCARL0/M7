<?php
// Start session and include database connection
session_start();
include 'dades.php'; // Ensure this file sets up a PDO connection as $conn

// Check if the user is logged in
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// Initialize variables
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titol = $_POST['titol'] ?? '';
    $descripcio = $_POST['descripcio'] ?? '';
    $data_creacio = date('Y-m-d H:i:s');

    // Validate input
    if (empty($titol) || empty($descripcio)) {
        $message = 'Tots els camps són obligatoris.';
    } else {
        try {
            // Prepare the SQL statement
            $stmt = $conn->prepare("INSERT INTO contingut (titol, descripcio, data_creacio) VALUES (:titol, :descripcio, :data_creacio)");
            // Bind parameters
            $stmt->bindValue(':titol', $titol, PDO::PARAM_STR);
            $stmt->bindValue(':descripcio', $descripcio, PDO::PARAM_STR);
            $stmt->bindValue(':data_creacio', $data_creacio, PDO::PARAM_STR);

            // Execute the statement
            $stmt->execute();

            $message = 'Dades introduïdes correctament!';
        } catch (PDOException $e) {
            $message = 'Error en inserir les dades: ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Formulari d'Inserció</title>
</head>
<body>
<h1>Formulari d'Inserció</h1>

<?php if (!empty($message)): ?>
    <p><?= htmlspecialchars($message) ?></p>
<?php endif; ?>

<form method="post" action="">
    <label for="titol">Títol:</label>
    <input type="text" id="titol" name="titol" required>
    <br>
    <label for="descripcio">Descripció:</label>
    <textarea id="descripcio" name="descripcio" required></textarea>
    <br>
    <button type="submit">Enviar</button>
</form>
</body>
</html>
