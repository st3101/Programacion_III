<?php
namespace Leonardi\Santiago;

include_once "clases/auto.php";

// Verificamos si se recibió una patente por POST
if (isset($_POST['patente'])) {

    // Obtener la patente enviada por POST
    $patente = $_POST['patente'];
    
    // Llamar al método verificarAutoJSON para obtener el mensaje
    $mensaje = Auto::verificarAutoJSON($patente);
    
    // Devolver la respuesta en formato JSON
    echo $mensaje;
} else {
    // Si no se recibió una patente por POST, devolver un mensaje de error
    $respuesta = [
        'exito' => false,
        'mensaje' => 'No se proporcionó una patente.',
    ];
    echo json_encode($respuesta);
}
