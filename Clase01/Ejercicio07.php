<?php

//Santiago Leonardi
//Ejercicio 07

/* Generar una aplicación que permita cargar los primeros 10 números impares en un Array.Luego imprimir 
(utilizando la estructura for) cada uno en una línea distinta (recordar que el salto de línea en HTML es la etiqueta <br/>).
Repetir la impresión de los números utilizando las estructuras while y foreach.*/


$cantidadImpares=0;
$array;
$seguir = true;
$i=0;
$j=0;

//Numeros Impares
while($seguir)
{
    if($i%2 == 1)
    {
        
        $cantidadImpares++;
        $array[$j] = $i;
        $j++;
    }

    if($cantidadImpares == 10)
    {
        $seguir = false;
    }
    $i++;
}

//For
echo "For";
for($z=0;$z<10;$z++)
{
    echo "<br/>$array[$z]";
}

//While
echo "<br/><br/>While";
$i=0;
while($i<10)
{
    echo "<br/>$array[$i]";

    $i++;
}

//Foreach
echo "<br/><br/>Foreach";
foreach($array as $item)
{
    echo "$item<br/>";
}
?>