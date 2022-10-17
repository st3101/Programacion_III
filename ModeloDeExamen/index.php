<?php


switch($_SERVER["REQUEST_METHOD"])
{
    case "POST":
        switch(key($_POST))
        {
            case "altaVenta":
                include "altaVenta.php";
            break;

            case "consultaPizza":
                include "pizzaConsultar.php";
            break;

            case "consultaVentas":
                include "consultaVentas.php";
            break;
        }
    break;
  
    case "GET":

        switch(key($_GET))
        {
            case "altaPizza":
                include "pizzaCarga";
            break;
        }

}


