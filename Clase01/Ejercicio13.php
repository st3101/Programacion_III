<?php 
/* Aplicación No 13 (Arrays asociativos II)
Cargar los tres arrays con los siguientes valores y luego ‘juntarlos’ en uno. Luego mostrarlo por
pantalla.
“Perro”, “Gato”, “Ratón”, “Araña”, “Mosca”
“1986”, “1996”, “2015”, “78”, “86”
“php”, “mysql”, “html5”, “typescript”, “ajax”
Para cargar los arrays utilizar la función array_push. Para juntarlos, utilizar la función
array_merge. */

    $array  = array();
    $array1 = array();
    $array2 = array();
    $array3 = array();

    array_push($array1,"Perro");
    array_push($array1,"Gato");
    array_push($array1,"Raton");
    array_push($array1,"Araña");
    array_push($array1,"Mosca");

    array_push($array2,"1986");
    array_push($array2,"1996");
    array_push($array2,"2015");
    array_push($array2,"78");
    array_push($array2,"86");

    array_push($array3,"php");
    array_push($array3,"mysql");
    array_push($array3,"html5");
    array_push($array3,"typescript");
    array_push($array3,"ajax");

    $array = array_merge($array1,$array2,$array3);

    var_dump($array);
    
?>