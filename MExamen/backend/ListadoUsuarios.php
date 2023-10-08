<?php
/*
ListadoUsuarios.php: (GET) Se mostrará el listado completo de los usuarios, exepto la clave (obtenidos de la
base de datos) en una tabla (HTML con cabecera). Invocar al método TraerTodos.
*/

// Incluye la definición de la clase Usuario
require_once('./clases/Usuario.php'); // Ajusta la ruta según la estructura de tu proyecto
require_once("./clases/Conexion.php");
// Conecta a la base de datos si es necesario

// Llama al método de clase TraerTodos() para obtener todos los usuarios
$conexion = Conexion::UnaConexion();
$usuarios = Usuario::TraerTodos($conexion);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listado de Usuarios</title>
</head>
<body>
    <h1>Listado de Usuarios</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>ID de Perfil</th>
                <th>Perfil</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario->id; ?></td>
                    <td><?php echo $usuario->nombre; ?></td>
                    <td><?php echo $usuario->correo; ?></td>
                    <td><?php echo $usuario->id_perfil; ?></td>
                    <td><?php echo $usuario->perfil; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
