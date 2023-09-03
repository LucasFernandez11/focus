<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST["nombre"];
  $email = $_POST["email"];
  $mensaje = $_POST["mensaje"];
  $destinatario = "administracion@focus-digitalacademy.com"; // Reemplaza con tu dirección de correo electrónico

  $asunto = "Nuevo mensaje de contacto de $nombre";
  $contenido = "Nombre: $nombre\n";
  $contenido .= "Email: $email\n";
  $contenido .= "Mensaje:\n$mensaje\n";

  $headers = "From: $nombre <$email>";

  if (mail($destinatario, $asunto, $contenido, $headers)) {  
    echo "Gracias por contactarnos, $nombre. Responderemos a la brevedad.";
    echo "<br><br><a href='index.html'>Volver</a>";
} else {
    echo 'Error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.';
    echo "<br><br><a href='index.html'>Volver</a>";
  }

}

?>
