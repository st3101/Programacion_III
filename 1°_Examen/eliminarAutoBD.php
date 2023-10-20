<?php

namespace Leonardi\Santiago;

include_once "clases/autoBD.php";
include_once "clases/IParte1.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Trarmos el archivo
    $file = $_FILES['auto_json']["tmp_name"];

    //obtenemos todo el contenido
    $contenidoArchivo = file_get_contents($file);

    //lo decodificamos
    $autoData = json_decode($contenidoArchivo, true);

    
    if ($autoData === null) {
        // Si no se pudo decodificar el JSON correctamente, retornar un mensaje de error
        $response = [
            'exito' => false,
            'mensaje' => 'JSON inválido.',
        ];
    } else {
        // Crear una instancia de AutoBD con los datos del JSON
        $auto = new AutoBD(
            $autoData['patente'],
            $autoData['marca'],
            $autoData['color'],
            $autoData['precio'],
            null
        );
        

        // Intentar eliminar el auto
        $exito = $auto->eliminar();
        if ($exito) {
            $mensaje = 'Auto eliminado y registrado en autos_eliminados.json';
        } else {
            $mensaje = 'No se pudo eliminar el auto.';
        }

        $response = [
            'exito' => $exito,
            'mensaje' => $mensaje,
        ];
    }

    // Devolver la respuesta en formato JSON
    echo json_encode($response);
} else {
    // Si no se recibió un JSON por POST, devolver un mensaje de error
    $response = [
        'exito' => false,
        'mensaje' => 'Se esperaba una solicitud POST con un JSON válido.',
    ];
    echo json_encode($response);
}
