<?php
include_once "pizza.php";
include_once "venta.php";
include_once "archivo.php";
include_once "conexion.php";

/*
AltaVenta.php: (por POST)se recibe el email del usuario y el sabor,tipo y cantidad ,si el ítem existe en
Pizza.json, y hay stock guardar en la base de datos( con la fecha, número de pedido y id autoincremental ) y se
debe descontar la cantidad vendida del stock . */

date_default_timezone_set('America/Argentina/Buenos_Aires');

if(isset($_POST["usuario"]) && isset($_POST["mail"]) && isset($_POST["sabor"]) && isset($_POST["precio"]) && isset($_POST["tipo"]) && isset($_POST["cantidad"]))
{
    $pizza = new Pizza(0,$_POST["sabor"],$_POST["precio"],$_POST["tipo"],$_POST["cantidad"]);
    
    $arrayPizza = Archivo::cargarJson("Pizza.json");

    if($arrayPizza != null)
    {
        echo Pizza::mostrarArray($arrayPizza); 

        $arrayPizza = Pizza::descontarCantidad($arrayPizza, $pizza);
        if($arrayPizza != null)
        {
            $venta = new venta($_POST["usuario"],$_POST["mail"],$pizza);
            $conexion = conexion::dameUnObjetoAcceso();
            $venta->subirVenta($conexion);  
            
        }
        else
        {
            echo "No la suficiente cantidad de pizza";
        }
        
        echo "\n".Pizza::mostrarArray($arrayPizza); 
    }
   
}



