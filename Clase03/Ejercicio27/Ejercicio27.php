<?php

/* Aplicación No 27 (Copiar archivos invirtiendo su contenido)
Modificar el ejercicio anterior para que el contenido del archivo se copie de manera invertida,
es decir, si el archivo origen posee ‘Hola mundo’ en el archivo destino quede ‘odnum aloH’. */

$string = "";
$file = $_FILES["Ejercicio27"];

$name = date("Y_m_d_h_i_s");

$path_origen = $file["tmp_name"];
$path_destino = "../misArchivos/".$name.".txt";

$infFile = fopen($path_origen,"r+");

while(!feof($infFile))
{
    $string .= fgets($infFile);
}

$textoAlrevez = palabraAlrevez($string);

fclose($infFile);

if(file_put_contents($path_destino, $textoAlrevez))
{
    echo "\n\nGuardado";
}
else
{
    echo "\n\nError";
}

#--------------------------------------------------
function palabraAlrevez(string $palabra)
{
    $cantidadDeLetras = strlen($palabra);
    $palabraArvez = "";
    $j = 0;

    if($palabra != null)
    {
       for ($i=$cantidadDeLetras; $i > 0; $i--) 
       { 
        $palabraArvez[$i-1] = $palabra[$j];
        $j++;
       };
    }

    return $palabraArvez;
}

?>
