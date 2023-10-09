<?php
/*
EliminarUsuario.php: Si recibe el parámetro id por POST, más el parámetro accion con valor "borrar", se
deberá borrar el usuario (invocando al método Eliminar).
Retornar un JSON que contendrá: éxito(bool) y mensaje(string) indicando lo acontecido.
*/

// Incluye la definición de la clase Usuario y la interfaz IBM
require_once('./clases/IBM.php'); 
require_once('./clases/Usuario.php');
require_once('./clases/Conexion.php');

$accion = $_POST["accion"];
$id = $_POST["id"];

// Verifica si se reciben los parámetros id y accion por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $accion == "borrar" && $id != null) {

    $exito = Usuario::Eliminar($id);

    if ($exito) {
        // Usuario eliminado con éxito
        $respuesta = array(
            'exito' => true,
            'mensaje' => 'Usuario eliminado con éxito'
        );
    } else {
        // Error al eliminar el usuario
        $respuesta = array(
            'exito' => false,
            'mensaje' => 'Error al eliminar el usuario'
        );
    }
    }else {
        // Parámetros incorrectos
        $respuesta = array(
            'exito' => false,
            'mensaje' => 'Parámetros incorrectos'
        );
    }
// Devuelve una respuesta JSON
echo json_encode($respuesta);
       
?>