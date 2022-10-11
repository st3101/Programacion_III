<?php

//Santiago Leonardi
//Ejercicio n° 1

/*Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.*/

$valor = 1;
$sumaTotal = 0;

/*
while(true)
{   
    $sumaTotal += $valor;

    if($sumaTotal > 1000)
    {
        $sumaTotal -= $valor;
        break;
    }
    $valor++;
}
*/

while($sumaTotal < 1000)
{   
    $sumaTotal += $valor;
    $valor++;
}
$valor--;
$sumaTotal -= $valor;


echo "El resultado es:$sumaTotal <br>Se sumaron: $valor numeros";

?>
