<?php

namespace Leonardi\Santiago;
//require_once './clases/autoBD.php';
require_once ("./autoDB.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $file = $_FILES['auto_json'];

    $path_origen = $file["tmp_name"];

    $contenidoArchivo = file_get_contents($path_origen);

    $autoData = json_decode($contenidoArchivo, true);

    var_dump($autoData);

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
            $autoData['pathFoto']
        );

        // Intentar eliminar el auto
        //$exito = $auto->eliminar();
        $exito = true;
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
