<?php
namespace Leonardi\Santiago;
include_once "Clases/autoBD.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $file = $_FILES['auto_json']["tmp_name"];

    //obtenemos todo el contenido
    $contenidoArchivo = file_get_contents($file);

    //lo decodificamos
    $autoData = json_decode($contenidoArchivo, true);

    $auto = new AutoBD($autoData["patente"],$autoData["marca"],$autoData["color"],$autoData["precio"],null);

    $retorno = $auto->Agregar();

    echo $retorno;
}
else
{
    echo "Se esperaba un operacion POST";
}