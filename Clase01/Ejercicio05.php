<?php

//Santiago Leonardi
//Ejercicio 05

/* Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”. */

$num = 53;
$strinNum = (string)$num;

$stringSegundoNumero;
$stringSegundoNumero = " y ";

if($num >= 20 && $num <= 60)
{
    switch ($strinNum[0]) {
        case '2':
            $stringPrimerNumero = "Veinte";
            break;
        case '3':
            $stringPrimerNumero = "Treinta";
            break;
        case '4':
            $stringPrimerNumero = "Cuarenta";
            break;
        case '5':
            $stringPrimerNumero = "Cincuenta";
            break;
        case '6':
             $stringPrimerNumero = "Sesenta";
            break;
            
    }
    
    switch($strinNum[1])
    {
      
      
        case '1':
            $stringSegundoNumero = $stringSegundoNumero."uno";
            break;
        case '2':
            $stringSegundoNumero = $stringSegundoNumero."dos";
            break;
        case '3':
            $stringSegundoNumero = $stringSegundoNumero."tres";
            break;
        case '4':
            $stringSegundoNumero = $stringSegundoNumero."cuatro";
            break;
        case '5':
            $stringSegundoNumero = $stringSegundoNumero."cinco";
            break;
        case '6':
            $stringSegundoNumero = $stringSegundoNumero."seis";
            break;
        case '7':
            $stringSegundoNumero = $stringSegundoNumero."siete";
            break;
        case '8':
            $stringSegundoNumero = $stringSegundoNumero."ocho";
            break;
        case '9':
            $stringSegundoNumero = $stringSegundoNumero."nueve";
            break;
        default:
            $stringSegundoNumero = "";
            break;
        
    }
    
    echo $stringPrimerNumero.$stringSegundoNumero;
}



?>
