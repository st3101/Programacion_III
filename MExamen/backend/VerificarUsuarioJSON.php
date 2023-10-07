<?php

require_once('./clases/Usuario.php'); // Ajusta la ruta según la estructura de tu proyecto
require_once('./clases/Conexion.php');

//Recibo metada
$file = $_FILES["usuario_json"];
//Traigo el la direcion del archivo
$path_origen = $file["tmp_name"];
//Obtengo la info del archivo
$contenidoArchivo = file_get_contents($path_origen);
//decodifico 
$usuario_json = json_decode($contenidoArchivo, true);

$retorno = "";
if($usuario_json != null) {
    // Llama al método de clase TraerUno() para verificar el usuario
    $conexion = Conexion::UnaConexion(); // Asegúrate de tener la conexión configurada
    $usuario = Usuario::TraerUno($conexion, $usuario_json);

    if($usuario !== null)
    {
        $retorno = array(
            "exito"=>true,
            "mensaje"=>"Usuario valido");
    }
    else
    {
        $retorno = array(
            'exito' => false,
            'mensaje' => 'Usuario no encontrado');
    }
}
else
{
    $retorno = array(
        "exito"=>false,
        "mensaje"=>"Json invalido");
}

echo json_encode($retorno);