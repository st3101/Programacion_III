<?php

/*Crear una página web que permita encriptar mensajes y que se guarden en un archivo de texto
y que sólo si se lee el archivo desde la página se podrá acceder a su texto claro, es decir se
desencriptará.
Crear la clase Enigma, la cual tendrá la funcionalidad de encriptar/desencriptar los mensajes.
Su método estático Encriptar, recibirá un mensaje y a cada número del código ASCII de cada
carácter del string le sumará 200. Una vez que cambie todos los caracteres, lo guardará en un
archivo de texto (el path también se recibirá por parámetro). Retornará TRUE si pudo guardar
correctamente el archivo encriptado, FALSE, caso contrario.
El método estático Desencriptar, recibirá sólo el path de dónde se leerá el archivo. Realizar el
proceso inverso para restarle a cada número del código ASCII de cada carácter leído 200, para
poder retornar el mensaje y ser mostrado desesncriptado. */
include "Enigma.php";

$path = "../misarchivos/Ejercicio28";
$texto = "Me van a encriptar :c";

if(Enigma::Encriptar($texto, $path))
{
    echo "Encriptado y guardado\n";
}
else
{
    echo "Error al encriptar\n";
}

echo Enigma::Desencripta($path);
