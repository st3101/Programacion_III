<?php

/* Aplicación No 7 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple. */

date_default_timezone_set('America/Argentina/Buenos_Aires');

$fecha = date("e: d/m/Y h:m:s");
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

echo $fecha;
echo "\nEstacion: $estacion ";