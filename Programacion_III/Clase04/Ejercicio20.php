<?php

include "usuarios.php";

if(isset($_POST["usuario"]))
{
    var_dump($_POST['usuario']);
}
else
{
    echo "No existe el usuario". PHP_EOL;
}

if(isset($_POST["clave"]))
{
    var_dump($_POST['clave']);
}
else
{
    echo "No existe el clave". PHP_EOL;
}

if(isset($_POST["mail"]))
{
    var_dump($_POST["mail"]);
}
else
{
    echo "No existe el mail". PHP_EOL;
}

$usuario1 = new usuario($_POST['usuario'],$_POST['clave'],$_POST["mail"]);

echo usuario::MostarInfo($usuario1);

?>