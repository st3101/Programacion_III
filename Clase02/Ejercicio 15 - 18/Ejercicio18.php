<?php
/*Aplicación No 18 (Par e impar)
Crear una función llamada EsPar que reciba un valor entero como parámetro y devuelva TRUE si
este número es par ó FALSE si es impar.
Reutilizando el código anterior, crear la función EsImpar.*/

if(esPar(0))
{
    echo "par";
}
else
{
    echo "Impar";
}
function esPar(int $numero)
{
    if($numero !== null)
    {
        if($numero % 2 == 0 )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>