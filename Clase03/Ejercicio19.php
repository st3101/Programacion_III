<?php
include_once "Auto.php";

/*
$auto1 = new auto("el","azul",100,date("d/m/y"));

$archivo = fopen("archivo.txt","a+");

    fwrite($archivo,auto::MostrarAuto($auto1)."\n");

fclose($archivo);
*/


/*
$archivo = fopen("archivo.txt","r");

$datosAuto;
$auto2 = array();
$a = array();

while(!feof($archivo))
    {   
        $datosAuto = fgets($archivo); 
        explode("PHP_EOL",$datosAuto);
        array_push( $a,$datosAuto);       
    }
    echo $a[0]."<br/>";
    echo $a[1];

    fclose($archivo);

    $auto = new auto("aa","bb",111,date("d/m/y"));
auto::GuardarAuto($auto);

    */

    $auto = array();
    $auto = auto::leerAutos();

    echo $auto[0];
?> 
