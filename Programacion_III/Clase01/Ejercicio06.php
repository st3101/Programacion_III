<?php

//Santiago Leonardi
//Ejercicio 06

/* Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado. */

$array;
$sumatotal = 0;
$promedio;

for($i=0;$i<5;$i++)
{
    $array[$i] = rand(1,10);
    $sumatotal = $sumatotal + $array[$i];
    echo $array[$i]."<br>";
}

$promedio = $sumatotal / 5;

if($promedio > 6)
{
    echo "<br>El promedio es MAYOR a 6. ";
}
else if($promedio == 6)
{
    echo "<br>El promedio es IGUAL a 6. ";
}
else
{
    echo "<br>El promedio es MENOR que 6.";
}

echo "<br>Tu promeedio es: $promedio";
?>