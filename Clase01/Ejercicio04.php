<?php
 /* Aplicación No 4 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron. */

$i = 1;
$acumulador = 0;

while($i <= 1000)
{
    $acumulador += $i;

    if($acumulador >= 1000)
    {
        $acumulador -= $i;
        break;
    }

    $i++;
    echo $i."\n";
}

echo "Acumulador: $acumulador";