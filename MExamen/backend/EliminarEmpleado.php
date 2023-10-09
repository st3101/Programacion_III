<?php

// Verificar si se ha recibido el parámetro id por POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Llamar al método Eliminar
    if (Empleado::Eliminar($id)) {
        // Empleado eliminado exitosamente
        $response = array(
            'exito' => true,
            'mensaje' => 'Empleado eliminado con éxito.'
        );
    } else {
        // Error al eliminar el empleado
        $response = array(
            'exito' => false,
            'mensaje' => 'Error al eliminar el empleado.'
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
