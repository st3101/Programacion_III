<?php
include "pizza.php";

$arrayPizza = array();
$arrayPizza = Pizza::AgregarPizza($arrayPizza,"mussarela",50,"piedra",50);


if(isset($_GET["sabor"]) && isset($_GET["precio"]) && isset($_GET["tipo"]) && isset($_GET["cantidad"]))
{
   $arrayPizza = Pizza::agregarPizza($arrayPizza,$_GET["sabor"],$_GET["precio"],$_GET["tipo"],$_GET["cantidad"]);
}

echo Pizza::mostarArrayPizzas($arrayPizza);