<?php
/*
AltaUsuario.php: Se recibe por POST el correo, la clave, el nombre y el id_perfil. Se invocará al método
Agregar.
Se retornará un JSON que contendrá: éxito(bool) y mensaje(string) indicando lo acontecido.
*/
require_once('./clases/Usuario.php');
require_once("./clases/Conexion.php");

$nombre = $_POST['nombre'];
$correo = $_POST["correo"];
$clave = $_POST["clave"];
$id_perfil = $_POST["idPefil"];

$usuario = new Usuario(null,$nombre,$correo,$clave,$id_perfil, null);

$conexion = Conexion::UnaConexion();

if($usuario != null && $conexion != null)
{
    
    if($usuario->Agregar($conexion)){
        $retorno = array(
            "exito"=>true,
            "mensaje"=>"Usuario cargado"); 
    }
    else{
        $retorno = array(
            "exito"=>false,
            "mensaje"=>"Error al cargar usuario"); 
    }
}
else
{
    $retorno = array(
        "exito"=>false,
        "mensaje"=>"Error en la conexion o en el usuario"); 
}

echo json_encode($retorno);
?>