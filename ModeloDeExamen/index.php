<?php

include_once "pizza.php";

$arrayPizzas = array();

$arrayPizzas = Pizza::AgregarPizza($arrayPizzas,"Mussarela",50,"Molde",30);
$arrayPizzas = Pizza::AgregarPizza($arrayPizzas,"Napolitana",85,"Piedra",20);

if(Pizza::guardarArrayPizzasJson($arrayPizzas))
{
    echo "Se guardo";
}
else
{
    echo "No se guardo";
}

