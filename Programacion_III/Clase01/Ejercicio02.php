<?php

//Santiago Leonardi
//Ejercicio 02

/*Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.*/

$mes = date('m');
$estacion;

if($mes >= 1 && $mes <= 3)
{
    $estacion = "Verano";
}
else if($mes >= 4 && $mes <= 6)
{
    $estacion = "Otoño";
}
else if($mes >= 7 && $mes <= 9)
{
    $estacion = "Invierno";
}
else
{
    $estacion = "Primavera";
}

echo date('d/m/Y');
echo "<br>Estacion: $estacion ";

?>