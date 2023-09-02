<?php
/*Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras.*/

$lapicera1 = array("Color"=>"Negro","Marca"=>"Esta", "Trazo"=>"Fino" ,"Precio"=>10);
$lapicera2 = array("Color"=>"Azul","Marca"=>"Bic", "Trazo"=>"Fino" ,"Precio"=>15);
$lapicera3 = array("Color"=>"Rojo","Marca"=>"Barata", "Trazo"=>"Grueso" ,"Precio"=>5);

foreach ($lapicera1 as $key => $value) {
    echo $key . ": " . $value  ." | ";
}
echo "\n";
foreach ($lapicera2 as $key => $value) {
    echo $key . ": " . $value  ." | ";
}
echo "\n";
foreach ($lapicera3 as $key => $value) {
    echo $key . ": " . $value  ." | ";
}


//Forma 2
/*
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
*/
