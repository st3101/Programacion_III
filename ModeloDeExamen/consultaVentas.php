<?php
include_once "pizza.php";
include_once "venta.php";
include_once "validadores.php";
/* 
4- (3 pts.)ConsultasVentas.php: necesito saber :
a- la cantidad de pizzas vendidas
b- el listado de ventas entre dos fechas ordenado por sabor.
c- el listado de ventas de un usuario ingresado
d- el listado de ventas de un sabor ingresado
*/


$pizza1 = new Pizza(1,"ccc",10,"molde",1);
$pizza2 = new Pizza(2,"aaa",20,"molde",5);
$pizza3 = new Pizza(3,"ddd",30,"piedra",10);

$venta1 = new venta("st3101","santiago@gmail.com",$pizza1,"16-05-2021");
$venta2 = new venta("alfredo","el@hotmail.com",$pizza2,"16-10-2022");
$venta3 = new venta("alfa","lobo@yahoo.com",$pizza3,"25-11-2020");

$arrayVentas = array($venta1,$venta2,$venta3);

	
echo Venta::informarArrayVentas($arrayVentas);

$arrayVentas = venta::informarEntreFechaOrdenadoSabor("16-05-2021","16-05-2022",$arrayVentas);

echo "\n\n".Venta::informarArrayVentas($arrayVentas);

//echo Venta::contarVentas($arrayVentas)."\n";

/*


$fecha = Date("d,m,Y");

//$arrayFecha = Validadores::separaFechaArray($fecha);





$arrayFecha2 = $arrayFecha;



echo $arrayFecha[0] . " " . $arrayFecha[1] ." " . $arrayFecha[2]."\n";
echo $arrayFecha2[0] . " " . $arrayFecha2[1] ." " . $arrayFecha2[2]."\n";


$valor = Validadores::MayorMenorFecha($arrayFecha,$arrayFecha2);

if($valor == 0)
{
    echo "iguales";
}
else if ($valor == -1)
{
    echo "El primero es menor al segundo";
}
else
{
    echo "El segundo es menor al primero";
}
*/
