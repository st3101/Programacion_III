<?php 

/*Aplicación No 15 (Potencias de números)
Mostrar por pantalla las primeras 4 potencias de los números del uno 1 al 4 (hacer una función que
las calcule invocando la función pow).*/

for ($i=0; $i < 4; $i++) 
{   
    echo "\n". $i+1 .") "; 
    for ($j=0; $j < 4; $j++) 
    { 
        echo pow($i+1,$j+1)." - ";       
    }
    
}


?>