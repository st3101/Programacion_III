<?php
/* Aplicación No 6 (Calculadora)
Escribir un programa que use la variable $operador que pueda almacenar los símbolos
matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
resultado por pantalla. */

$operador = "+";
$op1 = 10;
$op2 = 5;

switch ($operador) {
    case '+':
        $resultado = $op1 + $op2;
        break;
    case '-':
        $resultado = $op1 - $op2;
        break;
        case '*':
        $resultado = $op1 * $op2; 
        break;
        case '/':
            if($op2 != 0)
            {
                $resultado = $op1 / $op2;
            }
            else
            {
                $resultado = "Error, no se puede divir por 0";
            }
            
            break;
    default:
        $resultado =  "Operador erroneo";
        break;
}

echo "Resuldo: $resultado";
