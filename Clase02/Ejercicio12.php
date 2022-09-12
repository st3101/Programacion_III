<?php

//Santiago Leonardi
//Ejercicio 12

/*Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”. */

$array = array('h','o','l','a');
leerAlreves($array);

function leerAlreves($a)
{
    $i=count($a)-1;

    for($i;$i>-1;$i--)
    {
       echo $a[$i];
    }
}

?>