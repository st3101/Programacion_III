<?php
/* Aplicación No 17 (Invertir palabra)
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La función
validará que la cantidad de caracteres que tiene $palabra no supere a $max y además deberá
determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario. */

echo validarPalabra("Recuperatorio",50);

function validarPalabra(string $palabra,int $max)
{
    $retorno = 0;
    if($palabra != null && $max != null && $max > 0)
    {
        if(strlen($palabra) <= $max)
        {
            switch ($palabra) {
                case "Recuperatorio":
                case 'Parcial':
                case 'Programacion':
                    $retorno = 1;
                    break;
                default:
                    $retorno = 0;
                    break;
            }
        }
    }
    return $retorno;
}

?>