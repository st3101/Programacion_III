<?php
// Incluir la clase Empleado y cualquier otro archivo necesario
require_once '../backend/clases/Empleado.php';
require_once "../backend/clases/Conexion.php";

// Obtener la lista de empleados desde la base de datos
$empleados = Empleado::TraerTodos(Conexion::UnaConexion());
//<td><img src="./backend/empleados/fotos/<?php echo $empleado->foto; ?>" alt="Foto" width="50" height="50"></td>
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listado de Empleados</title>
</head>
<body>
    <h1>Listado de Empleados</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Perfil</th>
                <th>Sueldo</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleados as $empleado) { ?>
                <tr>
                    <td><?php echo $empleado->id; ?></td>
                    <td><?php echo $empleado->nombre; ?></td>
                    <td><?php echo $empleado->correo; ?></td>
                    <td><?php echo $empleado->perfil; ?></td>
                    <td><?php echo $empleado->sueldo; ?></td>
                    <td><img src="<?php echo ".".$empleado->foto; ?>" alt="Foto" width="50" height="50"></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</
