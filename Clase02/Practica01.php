<?php

$nombre = "Santiago";

function funcion1(string $nombre, $sexo = "Masculino") : string
{
    return "Nombre: ".$nombre." Sexo: ".$sexo.".<br/>";
}

echo funcion1($nombre);

function funcion2(string|int $nombre)
{
    if(gettype($nombre) == "string")
    {
        return "Es un string <br/>";
    }
    if(gettype($nombre) == "integer")
    {
        return "Es un int <br/>";
    } 
}

echo funcion2("HOLA").funcion2(3);