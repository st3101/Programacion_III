<?php

namespace Leonardi\Santiago;
require_once './clases/auto.php';

// Verificamos si se enviaron datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Incluimos la clase Auto

    // Obtener los datos enviados por POST
    $patente = $_POST['patente'];
    $marca = $_POST['marca'];
    $color = $_POST['color'];
    $precio = $_POST['precio'];

    //Crear una instancia de Auto
    $auto = new Auto($patente, $marca, $color, $precio);

    $archivoJSON = './archivos/autos.json';
    /*
    // Obtener el archivo JSON existente o crear uno nuevo si no existe
    $autos = [];

    if (file_exists($archivoJSON)) {
        $autos = json_decode(file_get_contents($archivoJSON), true);
    }
    // Agregar el auto a la lista
    $autos[] = [
        'patente' => $auto->getPatente(),
        'marca' => $auto->getMarca(),
        'color' => $auto->getColor(),
        'precio' => $auto->getPrecio(),
    ];
    // Convertir la lista de autos a formato JSON y guardarla en el archivo
    $jsonAutos = json_encode($autos, JSON_PRETTY_PRINT);
    $autos
    file_put_contents($archivoJSON, $jsonAutos);
    */
    
    echO $auto->guardarJSON($archivoJSON);
} else {
    echo "Error: Se esperaba una solicitud POST.";
}
?>
