<?php

include_once ("../backend/clases/Empleado.php");
// Verificar si se han recibido los datos esperados por POST
if (
    isset($_POST['nombre']) &&
    isset($_POST['correo']) &&
    isset($_POST['clave']) &&
    isset($_POST['id_perfil']) &&
    isset($_POST['sueldo']) &&
    isset($_FILES['foto'])) 
    {
    // Obtener los datos recibidos por POST
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $id_perfil = $_POST['id_perfil'];
    $sueldo = $_POST['sueldo'];
    
    // Verificar si la foto se subió correctamente
    if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        // Generar un nombre único para la foto
        $nombre_foto = $nombre . '.' . time() . '.jpg';
        
        // Mover la foto a la ubicación deseada
        $ruta_foto = './backend/empleados/fotos/' . $nombre_foto;
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_foto);
        
        // Crear un objeto Empleado y agregarlo a la base de datos
        $empleado = new Empleado(null, $nombre, $correo, $clave, $id_perfil, $perfil, $nombre_foto, $sueldo);
        
        if ($empleado->Agregar()) {
            // Registro agregado exitosamente
            $response = array(
                'exito' => true,
                'mensaje' => 'Empleado registrado con éxito.'
            );
        } else {
            // Error al agregar el registro
            $response = array(
                'exito' => false,
                'mensaje' => 'Error al registrar el empleado.'
            );
        }
    } else {
        // Error al subir la foto
        $response = array(
            'exito' => false,
            'mensaje' => 'Error al subir la foto del empleado.'
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
