<?php
const PATH_USUARIOS = '../backend/archivos/usuarios.json';
require_once "../backend/clases/Usuario.php";
require_once "../backend/clases/Empleado.php";
require_once "../backend/clases/Conexion.php";
#region Guardar Json
/*
// Crear una instancia de Usuario
$usuario = new Usuario(2, 'Santiago Leonardi', 'Santiago.t.leonardi@gmail.com', '42640255', 3, 'admin');

// Llamar al método ToJSON() para obtener los datos en formato JSON
$jsonData = $usuario->ToJSON();

$resultado = $usuario->GuardarEnArchivo(PATH_USUARIOS);
*/
#endregion

#region Cargar Json
/*
$usuarios = Usuario::TraerTodosJSON();
Usuario::MostrarArrayUsuario($usuarios);
*/
#endregion

#region Guardar MySQL
/*
$conexion = Conexion::UnaConexion();
$usuario = new Usuario(2, 'Alan Baez', 'alin@gmail.com', '123456789', 2, 'usuario');
$exito = $usuario->Agregar($conexion);

if ($exito) {
    echo "Usuario agregado exitosamente.";
} else {
    echo " Error al agregar el usuario.";
}
*/
#endregion

#region Cargar MySQL
/*
$conexion = Conexion::UnaConexion();
$usuarios = Usuario::TraerTodos($conexion);
Usuario::MostrarArrayUsuario($usuarios);
*/
#endregion

#region TrerUno MySQL
/*
$conexion = Conexion::UnaConexion();
// Parámetros con correo y clave
$params = array("correo" => "Santiago.t.leonardi@gmail.com","clave" => 42640255);
// Obtener un usuario por correo y clave
$usuario = Usuario::TraerUno($conexion,$params);
if($usuario != null){
    echo $usuario->MostraUnUsuario();
}
else{
    echo "No lo encontro";
}
*/
#endregion


/*
var_dump(Empleado::TraerTodos(Conexion::UnaConexion()));
*/
$usuarios = Empleado::TraerTodos(Conexion::UnaConexion());
//$usuario = new Empleado(1,"a","b",2,3,"a","../backend/empleado/fotos/juana.024247.jpg",4);


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
                <th>Foto</th>
                <th>Sueldo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario->id; ?></td>
                    <td><?php echo $usuario->nombre; ?></td>
                    <td><?php echo $usuario->correo; ?></td>
                    <td><?php echo $usuario->id_perfil; ?> 
                    <td> <img src="<?php echo ".".$usuario->foto; ?>" width="200" height="150"></td>                                 
                    <td><?php echo $usuario->sueldo; ?></td>
                </tr>
            <?php endforeach; ?>
            <?php ?>
        </tbody>
    </table>
</body>
</html>

