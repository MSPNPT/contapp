<!-- procesar_formulario.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $mensaje = $_POST["mensaje"];

    // Crear el mensaje a almacenar en el archivo
    $mensaje_a_almacenar = "Nombre: $nombre\n";
    $mensaje_a_almacenar .= "Email: $email\n";
    $mensaje_a_almacenar .= "Teléfono: $telefono\n";
    $mensaje_a_almacenar .= "Mensaje:\n$mensaje\n\n";

    // Especifica la ruta del archivo de almacenamiento
    $archivo_almacenamiento = "mensajes.txt";

    // Almacenar el mensaje en el archivo
    file_put_contents($archivo_almacenamiento, $mensaje_a_almacenar, FILE_APPEND);

    // Configura el destinatario del correo electrónico (tu dirección de correo)
    $destinatario = "tallerdebicicletasfixyshop@email.com";

    // Configura el asunto del correo
    $asunto = "Nuevo mensaje de contacto";

    // Construye el cuerpo del correo
    $cuerpo_correo = "Nombre: $nombre\n";
    $cuerpo_correo .= "Email: $email\n";
    $cuerpo_correo .= "Teléfono: $telefono\n";
    $cuerpo_correo .= "Mensaje:\n$mensaje";

    // Configura las cabeceras del correo
    $cabeceras = "From: $email\r\n";
    $cabeceras .= "Reply-To: $email\r\n";

    // Envia el correo electrónico
    mail($destinatario, $asunto, $cuerpo_correo, $cabeceras);

    // Puedes redirigir al usuario a una página de agradecimiento o mostrar un mensaje
    header("Location: gracias.html");
    exit();
}
?>
