<?php

//Santiago Leonardi 
//Ejercicio 09

/* Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras. */

$j = 0;

$lapicera = array("Color" => array("Azul","Rojo","Negro"),
                  "Marca" => array("Alfa","Beta","Gamma"),
                  "Trazo" => array("Fino","Mediano","Grueso"),
                  "Precio"=> array(1,2,3));

for($i = 0;$i < 3 ;$i++)
{
    $j++;
    echo $j."° ". 
    $lapicera["Color"][$i] ." ". 
    $lapicera["Marca"][$i] ." ". 
    $lapicera["Trazo"][$i] ." ". 
    $lapicera["Precio"][$i]." "."<br/>";
}


?>