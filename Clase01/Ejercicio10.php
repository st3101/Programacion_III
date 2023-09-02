<?php
/* Aplicación No 9 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado. */

$array = array();
$acunulador = 0;
 
for ($i=0; $i < 5; $i++) {

    $array[$i] = rand(0,10);
    $acunulador += $array[$i];
}

for ($i=0; $i < 5; $i++) {

    echo $array[$i] . "\n";
 }
 
$promedio = $acunulador / 5;

//Harcodeo promedio forsar el 6
//$promedio = 6;

if($promedio > 6)
{
    $text = "El promedio es mayor a 6";
}
else if($promedio < 6)
{
    $text = "El promedio es menor a 6";
}
else
{
    $text = "El promedio es 6";
}

echo "Promedio: $promedio\n";
echo $text;