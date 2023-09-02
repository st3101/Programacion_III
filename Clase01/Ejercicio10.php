<?php
/* Aplicación No 10 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números utilizando
las estructuras while y foreach. */

$continue = true;
$array = array();
$i = 0;
$j = 0;

while($continue)
{
    if($i % 2 == 1)
    {
        array_push($array,$i);
        $j++;

        if($j >= 5)
        {
            break;
        }
    }
    $i++;
}

//Imprecion For
echo "For\n";
for ($i=0; $i < 5; $i++) { 
    echo $array[$i]."\n";
}

//Imprecion While
echo "\nWhile\n";
$j = 0;
while ($j <= 4) {
    echo $array[$j]."\n";
    $j++;
}

//Imprecio Foreach
echo "\nForeach\n";
foreach ($array as $item) {
    echo $item."\n";
}