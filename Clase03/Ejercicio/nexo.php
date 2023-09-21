<?php
include "../../Biblioteca/Archivo.php";

if(isset($_POST["accion"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["legajo"]))
{
    $accion = $_POST["accion"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $legajo = $_POST["legajo"];

    $formatoTexto = $legajo."-".$apellido."-".$nombre;

    if(Archivo::guardar($formatoTexto,"../misArchivos/alumno.txt"))
    {
        echo "Se guardo";
    }
    else
    {
        echo "no se guardo";
    }
}


