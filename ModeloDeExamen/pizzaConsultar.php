<?php

include "pizza.php";
include "archivo.php";

/*
PizzaConsultar.php: (por POST)Se ingresa Sabor,Tipo, si coincide con algún registro del archivo Pizza.json,
retornar “Si Hay”. De lo contrario informar si no existe el tipo o el sabor.
*/

$arrayPizza = Archivo::cargarJson("pizza.json"); 

$pizza = new Pizza(Pizza::newID($arrayPizza),$_POST["sabor"],$_POST["precio"],$_POST["tipo"],$_POST["cantidad"]);

if(Pizza::pizzaEnArrayIndice($arrayPizza,$pizza) > -1)
{
    echo "Si Hay";
}   
else
{
    echo "No Hay";
}

?>