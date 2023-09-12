<?php

/*Aplicación No 14 (Arrays de Arrays)
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays.*/

$arrayIndexado = array(array("Perro","Gato","Raton","Araña","Mosca"),array(1986,1996,2015,78,86),array("php","mysql","html5","typescript","ajax"));
$arrayAsociativo = array("array1"=>array("Perro","Gato","Raton","Araña","Mosca"),"array2"=>array(1986,1996,2015,78,86),"array3"=>array("php","mysql","html5","typescript","ajax"));

echo "Array Indexado \n";
foreach ($arrayIndexado as $key => $value) {
    foreach ($value as $a) {
        echo $a." - ";
        # code...
    }
}
echo "\n\nArray Asociativo\n";
foreach ($arrayAsociativo as $key => $value) {
    foreach ($value as $a) {
        echo $a." - ";
    }
}

?>