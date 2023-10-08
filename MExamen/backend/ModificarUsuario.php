<?php

// Incluye la definición de la clase Usuario y la interfaz IBM
require_once('./clases/IBM.php'); 
require_once('./clases/Usuario.php');
require_once('./clases/Conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conecta a la base de datos si es necesario

    // Obtiene y decodifica el JSON del parámetro usuario_json
    //Recibo metada
    $file = $_FILES["usuario_json"];
    //Traigo el la direcion del archivo
    $path_origen = $file["tmp_name"];
    //Obtengo la info del archivo
    $contenidoArchivo = file_get_contents($path_origen);
    //decodifico 
    $usuario_json = json_decode($contenidoArchivo, true);

    if ($usuario_json !== null) {
        // Crea una instancia de Usuario
        $usuario = new Usuario(
            $usuario_json['id'],
            $usuario_json['nombre'],
            $usuario_json['correo'],
            $usuario_json['clave'],
            $usuario_json['id_perfil'],
            null
        );

        // Llama al método Modificar para modificar el usuario en la base de datos
        $conexion = Conexion::UnaConexion();
        $exito = $usuario->Modificar();

        if ($exito) {
            // Usuario modificado con éxito
            $respuesta = array(
                'exito' => true,
                'mensaje' => 'Usuario modificado con éxito'
            );
        } else {
            // Error al modificar el usuario
            $respuesta = array(
                'exito' => false,
                'mensaje' => 'Error al modificar el usuario'
            );
        }
    } else {
        // JSON inválido
        $respuesta = array(
            'exito' => false,
            'mensaje' => 'JSON inválido'
        );
    }
    echo json_encode($respuesta);
} else {
    // Si no es una solicitud POST, muestra un mensaje de error o realiza alguna acción adecuada.
    echo json_encode(array(
        'exito' => false,
        'mensaje' => 'Método no permitido'
    ));
}

?>
