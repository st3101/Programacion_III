<?php

include_once 'usuario.php';
include_once 'conexion.php';

/* Archivoregistro.php 
Recibe los datos del usuario( nombre,apellido, clave,mail,localidad )por POST ,
crear un objeto con la fecha de registro y utilizar sus métodos para poder hacer el alta,
guardando los datos la base de datos
retorna si se pudo agregar o no. */

if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['clave']) && isset($_POST['mail']) && isset($_POST['localidad']))
{
    $nombre = $_POST['nombre'];
    $apellido =  $_POST['apellido'];
    $clave = $_POST['clave'];
    $mail = $_POST['mail'];
    $localidad = $_POST['localidad'];
}
$unUsuario = new Usuario($nombre,$apellido,$clave,$mail,$localidad);

$unUsuario->subirUsuario();

//echo Usuario::mostrarUsuario($unUsuario);



 

