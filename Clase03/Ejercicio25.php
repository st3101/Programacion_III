<?php
/* Aplicación No 25 (Contar letras)
Se quiere realizar una aplicación que lea un archivo (../misArchivos/palabras.txt) y ofrezca
estadísticas sobre cuantas palabras de 1, 2, 3, 4 y más de 4 letras hay en el texto. No tener en
cuenta los espacios en blanco ni saltos de líneas como palabras.
Los resultados mostrarlos en una tabla. */

$path = "./misArchivos/palabras.txt";

$archivo = fopen($path,"r");
$string = "";

$contadorError = 0;
$contadorUnaLetras = 0;
$contadorDosLetras = 0;
$contadorTresletras = 0;
$contadorCuatroLetras = 0;
$contadorMasDeCuatroLetras = 0;


while(!feof($archivo))
{
    $string .= fgets($archivo);
}
fclose($archivo);

$array = preg_split("/[\s,]+/",$string);
 
for ($i=0; $i < count($array); $i++) 
{ 
    $cantidadDeLetras = strlen($array[$i]);

    switch ($cantidadDeLetras)
    {
        case 1:
            $contadorUnaLetras++;
            break;
        case 2:
            $contadorDosLetras++;
            break;
        case 3:
            $contadorTresletras++;
            break;
        case 4:
            $contadorCuatroLetras++;
            break;
        case 0:
            $contadorError++;
            break;
        default:
        $contadorMasDeCuatroLetras++;
    }
}



echo "Cantidad de palabras por letras\nUna: ".$contadorUnaLetras."\nDos: ".$contadorDosLetras."\nTres: ".$contadorTresletras."\nCuatro: ".
$contadorCuatroLetras."\nMas de cuatro: ".$contadorMasDeCuatroLetras."\nError: ".$contadorError;

?>