<?php

namespace Leonardi\Santiago;
require_once './clases/auto.php';

// Verificamos si se enviaron datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Obtener los datos enviados por POST
    $patente = $_POST['patente'];
    $marca = $_POST['marca'];
    $color = $_POST['color'];
    $precio = $_POST['precio'];

    //Crear una instancia de Auto
    $auto = new Auto($patente, $marca, $color, $precio);

    $archivoJSON = './archivos/autos.json';
    
    echO $auto->guardarJSON($archivoJSON);
} else {
    echo "Error: Se esperaba una solicitud POST.";
}
?>
