<?php
/*AltaUsuarioJSON.php: Se recibe por POST el correo, la clave y el nombre. Invocar al método
GuardarEnArchivo.*/
require_once './clases/Usuario.php';
const PATH_USUARIOS = './archivos/usuarios.json';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["correo"]) && isset($_POST["clave"]) && isset($_POST["nombre"]))
{    

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    $usuario = new usuario(null,$nombre,$correo,$clave,null,null);

    echo $usuario->GuardarEnArchivo(PATH_USUARIOS);
}
else
{
    echo "Error";
}
?>