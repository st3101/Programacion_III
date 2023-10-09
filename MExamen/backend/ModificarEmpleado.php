<?php

// Verificar si se ha recibido el JSON de empleado y la foto por POST
if (
    isset($_POST['empleado_json']) &&
    isset($_FILES['foto'])
) {
    // Decodificar el JSON de empleado recibido
    $empleado_data = json_decode($_POST['empleado_json'], true);
    
    if ($empleado_data) {
        // Obtener los datos del JSON
        $id = $empleado_data['id'];
        $nombre = $empleado_data['nombre'];
        $correo = $empleado_data['correo'];
        $clave = $empleado_data['clave'];
        $id_perfil = $empleado_data['id_perfil'];
        $sueldo = $empleado_data['sueldo'];
        
        // Verificar si la foto se subió correctamente
        if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            // Generar un nuevo nombre único para la foto
            $nombre_foto = $nombre . '.' . time() . '.jpg';
            
            // Mover la nueva foto a la ubicación deseada
            $ruta_foto = './backend/empleados/fotos/' . $nombre_foto;
            move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_foto);
        } else {
            // Mantener el nombre de la foto existente si no se proporciona una nueva foto
            $nombre_foto = $empleado_data['pathFoto'];
        }
        
        // Crear un objeto Empleado con los datos actualizados
        $empleado = new Empleado($id, $nombre, $correo, $clave, $id_perfil, $perfil, $nombre_foto, $sueldo);
        
        // Llamar al método Modificar
        if ($empleado->Modificar()) {
            // Empleado modificado exitosamente
            $response = array(
                'exito' => true,
                'mensaje' => 'Empleado modificado con éxito.'
            );
        } else {
            // Error al modificar el empleado
            $response = array(
                'exito' => false,
                'mensaje' => 'Error al modificar el empleado.'
            );
        }
    } else {
        // Error al decodificar el JSON
        $response = array(
            'exito' => false,
            'mensaje' => 'Error al procesar los datos del empleado.'
        );
    }
} else {
    // Datos incompletos o no recibidos por POST
    $response = array(
        'exito' => false,
        'mensaje' => 'Datos incompletos o incorrectos recibidos.'
    );
}

// Devolver la respuesta en formato JSON
echo json_encode($response);
?>
