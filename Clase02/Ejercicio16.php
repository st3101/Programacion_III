<?php
/* Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden de las
letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.*/

$palabra = "HOLA";

echo palabraAlrevez($palabra);

function palabraAlrevez(string $palabra)
{
    $cantidadDeLetras = strlen($palabra);
    $palabraArvez = "";
    $j = 0;

    if($palabra != null)
    {
       for ($i=$cantidadDeLetras; $i > 0; $i--) 
       { 
        $palabraArvez[$i-1] = $palabra[$j];
        $j++;
       };
    }

    return $palabraArvez;
}

?>