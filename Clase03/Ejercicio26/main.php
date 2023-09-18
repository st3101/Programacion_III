<?php
/* Aplicación No 26 (Copiar archivos)
Generar una aplicación que sea capaz de copiar un archivo de texto (su ubicación se ingresará
por la página) hacia otro archivo que será creado y alojado en
./misArchivos/yyyy_mm_dd_hh_ii_ss.txt, dónde yyyy corresponde al año en curso, mm
al mes, dd al día, hh hora, ii minutos y ss segundos. */


$path = "./misArchivos/copiado.txt";
$path2 = "./a.txt";
/*

$file = $_FILES["a"];
 

if(copy($file["full_path"],$path))
{
    echo "Copiado";
}
else
{
    echo "la cague";
}
*/

copy("./a.txt","./misArchivos/copiado.txt");
?>