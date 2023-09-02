<?php

/* Aplicación No 8 (Números en letras)
Realizar un programa que en base al valor numérico de la variable $num, pueda mostrarse por
pantalla, el nombre del número que tenga dentro escrito con palabras, para los números entre
el 20 y el 60. */

$num = "23";

$StringNumero = "Numero invalido";
$flag = 1;

if($num >= 20 && $num <= 60)
{
    $n1 = $num[0];
    $n2 = $num[1];

    switch($n1)
    {
        case '2':
            $StringNumero = "Veinte";
            break;
        case '3':
            $StringNumero = "Trinta";
        break;
        case '4':
            $StringNumero = "Cuarenta";
            break;
        case '5':
            $StringNumero = "Cincuenta";
        break;
        case '6':
            $StringNumero = "Sesenta";
            $flag = 3;
            break;
        default:
            $StringNumero = "Numero Invalido";
            $flag = 0;
        break;
    }
    
    if($flag == true)
    {
        switch($n2)
        {
            case '1':
                $StringNumero .= " y uno";
                break;
            case '2':
                $StringNumero .= " y dos";
                break;
                
            case '3':
                $StringNumero .= " y tres";
                break;
                
            case '4':
                $StringNumero .= " y cuatro";
                break;
                
            case '5':
                $StringNumero .= " y cinco";
                break;
                
            case '6':
                $StringNumero .= " y seis";
                break;
                
            case '7':
                $StringNumero .= " y siete";
                break;
                
            case '8':
                $StringNumero .= " y ocho";
                break;
                
            case '9':
                $StringNumero .= " y nueve";
                break;     
        }
    }
    
}

echo $StringNumero ." ". $num;