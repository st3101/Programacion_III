<?php
/* Aplicación No 26 (Copiar archivos)
Generar una aplicación que sea capaz de copiar un archivo de texto (su ubicación se ingresará
por la página) hacia otro archivo que será creado y alojado en
./misArchivos/yyyy_mm_dd_hh_ii_ss.txt, dónde yyyy corresponde al año en curso, mm
al mes, dd al día, hh hora, ii minutos y ss segundos. */

$file = $_FILES["idArchivo"];

$name = date("Y_m_d_h_i_s");

$path_origen = $file["tmp_name"];
$path_destino = "../misArchivos/".$name.".txt";

if(copy($path_origen, $path_destino))
{
    echo "Copiado";
}
else
{
    echo "la cague";
}
?>