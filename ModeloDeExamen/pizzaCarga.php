<?php

include_once "pizza.php";
include_once "archivo.php";

/*
B- (1 pt.) PizzaCarga.php: (por GET)se ingresa Sabor, precio, Tipo (“molde” o “piedra”), cantidad( de unidades). Se
guardan los datos en en el archivo de texto Pizza.json, tomando un id autoincremental como
identificador(emulado) .Sí el sabor y tipo ya existen , se actualiza el precio y se suma al stock existente.
*/

$arrayPizzas = array();
$arrayPizzas = Pizza::add($arrayPizzas,1,"mussarela",50,"piedra",30);
$arrayPizzas = Pizza::add($arrayPizzas,2,"napolitana",85,"molde",20);

if(isset($_GET["sabor"]) && isset($_GET["precio"]) && isset($_GET["tipo"]) && isset($_GET["cantidad"]))
{
   $arrayPizzas = pizza::add($arrayPizzas,Pizza::newID($arrayPizzas),$_GET["sabor"],$_GET["precio"],$_GET["tipo"],$_GET["cantidad"]);
}

if(Archivo::guardarJson("pizza.json",$arrayPizzas))
{
    echo "Guardado\n";
}
else
{
    echo "Error al guardar\n";
}

echo Pizza::mostrarArray($arrayPizzas);