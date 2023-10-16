<?php

// Incluimos la clase Auto
require_once './clases/auto.php';

// Ruta del archivo JSON que contiene los datos de los autos
$archivoJSON = './archivos/autos.json';

// Verificamos si el archivo JSON existe
if (file_exists($archivoJSON)) {

    $autos = file_get_contents($archivoJSON);

    echo $autos;

} else {
    // Si el archivo JSON no existe, devolver un mensaje de error en JSON
    $errorJSON = json_encode(['error' => 'El archivo JSON no existe']);
    echo $errorJSON;
}
