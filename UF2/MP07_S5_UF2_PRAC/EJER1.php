<?php
// Importamos PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Carga automática de Composer

$errores = [];
$nombre = $email = $mensaje = "";
$archivoAdjunto = null;

// Procesamiento del formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación del campo Nombre
    if (empty($_POST["nombre"])) {
        $errores["nombre"] = "El nombre es obligatorio.";
    } else {
        $nombre = htmlspecialchars($_POST["nombre"]);
    }

    // Validación del Email
    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errores["email"] = "Correo electrónico no válido.";
    } else {
        $email = $_POST["email"];
    }

    // Validación del mensaje
    if (empty($_POST["mensaje"])) {
        $errores["mensaje"] = "El mensaje no puede estar vacío.";
    } else {
        $mensaje = htmlspecialchars($_POST["mensaje"]);
    }

    // Validación del archivo adjunto
    if (!empty($_FILES["archivo"]["name"])) {
        if ($_FILES["archivo"]["size"] > 2 * 1024 * 1024) { // Máximo 2MB
            $errores["archivo"] = "El archivo no puede superar los 2MB.";
        } elseif (!in_array($_FILES["archivo"]["type"], ["image/jpeg", "image/png", "application/pdf"])) {
            $errores["archivo"] = "Formato de archivo no permitido.";
        } else {
            $archivoAdjunto = $_FILES["archivo"];
        }
    }

    // Si no hay errores, enviamos el correo
    if (empty($errores)) {
        $mail = new PHPMailer(true);
        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'tu_correo@example.com'; // Credenciales SMTP
            $mail->Password = 'tu_contraseña'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Configuración del correo
            $mail->setFrom('tu_correo@example.com', 'Web Contact');
            $mail->addAddress($email); // Destinatario

            // Adjuntar archivo si existe
            if ($archivoAdjunto) {
                $mail->addAttachment($archivoAdjunto['tmp_name'], $archivoAdjunto['name']);
            }

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Nuevo mensaje de contacto';
            $mail->Body = "Nombre: $nombre <br>Email: $email <br>Mensaje: $mensaje";

            // Envío del correo
            $mail->send();
            echo "El mensaje se ha enviado correctamente.";
        } catch (Exception $e) {
            error_log("Error en el envío: " . $mail->ErrorInfo); // Registro de errores
            echo "Hubo un error al enviar el mensaje.";
        }
    }
}
?>
<!-- Formulario HTML -->
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="nombre" placeholder="Nombre">
    <input type="email" name="email" placeholder="Correo">
    <textarea name="mensaje" placeholder="Mensaje"></textarea>
    <input type="file" name="archivo">
    <button type="submit">Enviar</button>
</form>
