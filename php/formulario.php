<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST["nombre"];
  $email = $_POST["email"];
  $mensaje = $_POST["mensaje"];
  $destinatario = "administracion@focus-digitalacademy.com"; // Reemplaza con tu dirección de correo electrónico

  $asunto = "Nuevo mensaje desde la pagina, Nombre del remitente $nombre";
  // Cuerpo del mensaje en formato HTML
  $contenido = "<!DOCTYPE html>
  <html lang='es'>
  <head>
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <title>Nuevo mensaje de contacto</title>
  </head>
  <body style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;'>
  
      <div style='background-color: #ffffff; border-radius: 5px; padding: 20px;'>
          <h2 style='color: #333;'>Nuevo mensaje de contacto</h2>
          <p><strong>Nombre:</strong> $nombre</p>
          <p><strong>Email:</strong> $email</p>
          <p><strong>Mensaje:</strong></p>
          <p>$mensaje</p>
      </div>
  
  </body>
  </html>";

  // Encabezados para enviar un correo HTML
  $headers = "From: $nombre <$email>\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

  if (mail($destinatario, $asunto, $contenido, $headers)) {  
    echo "Gracias por contactarnos, $nombre. Responderemos a la brevedad.";
    echo "<br><br><a href='../index.html'>Volver</a>";
} else {
    echo 'Error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.';
    echo "<br><br><a href='../index.html'>Volver</a>";
  }

}

?>
